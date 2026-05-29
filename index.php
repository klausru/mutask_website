<?php
/**
 * index.php — tiny flat-file router for a Markdown one-pager/multi-page site.
 *
 * How it works:
 *   1. Every page is a Markdown file in /content (e.g. content/about.md).
 *   2. Each file may start with a front-matter block (title, order, nav)
 *      between two lines of "---". See content/about.md for an example.
 *   3. Pages are auto-discovered: drop in a new .md file and it shows up
 *      in the navigation automatically. No code changes needed.
 *   4. Clean URLs (e.g. /about) are mapped to ?page=about by .htaccess.
 *
 * You normally never need to touch this file. Editors only edit /content.
 */

require __DIR__ . '/config.php';
require __DIR__ . '/Parsedown.php';

/* --------------------------------------------------------------------- */
/* Helpers                                                               */
/* --------------------------------------------------------------------- */

/**
 * Split a raw Markdown file into [metadata array, body string].
 * Front matter is an optional block at the very top:
 *   ---
 *   title: About Us
 *   order: 2
 *   nav: true
 *   ---
 */
function parse_front_matter(string $raw): array
{
    $raw = str_replace("\r\n", "\n", $raw);
    $meta = [];
    $body = $raw;

    if (preg_match('/^---\s*\n(.*?)\n---\s*\n?(.*)$/s', $raw, $m)) {
        foreach (explode("\n", trim($m[1])) as $line) {
            if (strpos($line, ':') === false) {
                continue;
            }
            [$key, $val] = explode(':', $line, 2);
            $meta[strtolower(trim($key))] = trim($val);
        }
        $body = $m[2];
    }

    return [$meta, ltrim($body)];
}

/**
 * Turn a content filename into a URL slug / page key.
 */
function slug_from_path(string $path): string
{
    return strtolower(basename($path, '.md'));
}

/**
 * Scan /content and return the list of pages used to build the menu.
 * Each entry: ['slug' => ..., 'title' => ..., 'order' => ..., 'nav' => bool]
 */
function discover_pages(): array
{
    $pages = [];

    foreach (glob(__DIR__ . '/content/*.md') as $file) {
        $slug = slug_from_path($file);
        // Only [a-z0-9-] slugs are routable, so skip anything else.
        if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
            continue;
        }

        [$meta] = parse_front_matter(file_get_contents($file));

        $navValue = strtolower($meta['nav'] ?? 'true');
        $pages[] = [
            'slug'  => $slug,
            'title' => $meta['title'] ?? ucfirst(str_replace('-', ' ', $slug)),
            'order' => isset($meta['order']) ? (int) $meta['order'] : 999,
            'nav'   => !in_array($navValue, ['false', 'no', '0'], true),
        ];
    }

    usort($pages, function ($a, $b) {
        return [$a['order'], $a['title']] <=> [$b['order'], $b['title']];
    });

    return $pages;
}

/* --------------------------------------------------------------------- */
/* Routing                                                               */
/* --------------------------------------------------------------------- */

$requested = strtolower(trim($_GET['page'] ?? DEFAULT_PAGE, '/'));
if ($requested === '') {
    $requested = DEFAULT_PAGE;
}

$pages = discover_pages();
$navPages = array_filter($pages, fn($p) => $p['nav']);

// Whitelist: slug must be safe AND a matching file must exist.
$isValidSlug = (bool) preg_match('/^[a-z0-9-]+$/', $requested);
$contentFile = __DIR__ . '/content/' . $requested . '.md';
$found = $isValidSlug && is_file($contentFile);

if ($found) {
    [$meta, $markdown] = parse_front_matter(file_get_contents($contentFile));
    $currentSlug = $requested;
    $pageTitle   = $meta['title'] ?? ucfirst(str_replace('-', ' ', $requested));

    $parsedown = new Parsedown();
    $parsedown->setSafeMode(false); // content is authored by trusted editors
    $contentHtml = $parsedown->text($markdown);
} else {
    http_response_code(404);
    $currentSlug = null;
    $pageTitle   = 'Page not found';
    $contentHtml = '<h1>Page not found</h1>'
        . '<p>Sorry, that page doesn\'t exist. '
        . '<a href="/' . rawurlencode(DEFAULT_PAGE) . '">Back to start</a>.</p>';
}

/* --------------------------------------------------------------------- */
/* Render                                                                */
/* --------------------------------------------------------------------- */

require __DIR__ . '/templates/layout.php';
