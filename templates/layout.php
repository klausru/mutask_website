<?php
/**
 * templates/layout.php — the HTML shell wrapped around every page.
 * Variables provided by index.php:
 *   $pageTitle, $contentHtml, $navPages, $currentSlug
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle) ?> · <?= htmlspecialchars(SITE_NAME) ?></title>
    <link rel="stylesheet" href="/assets/simple.css">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header>
        <a class="brand" href="/">
            <strong><?= htmlspecialchars(SITE_NAME) ?></strong>
        </a>
        <?php if (SITE_TAGLINE !== ''): ?>
            <p class="tagline"><?= htmlspecialchars(SITE_TAGLINE) ?></p>
        <?php endif; ?>
        <nav>
            <?php foreach ($navPages as $p): ?>
                <a href="/<?= rawurlencode($p['slug']) ?>"
                   <?= $p['slug'] === $currentSlug ? 'aria-current="page"' : '' ?>>
                    <?= htmlspecialchars($p['title']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </header>

    <main>
        <?= $contentHtml ?>
    </main>

    <footer>
        <p><?= htmlspecialchars(SITE_FOOTER) ?></p>
    </footer>
</body>
</html>
