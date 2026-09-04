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
    <link rel="icon" type="image/png" href="/assets/imgs/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/assets/imgs/favicon.svg" />
<link rel="shortcut icon" href="/assets/imgs/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/assets/imgs/apple-touch-icon.png" />
<link rel="manifest" href="/assets/imgs/site.webmanifest" />
</head>
<body>
    <header>
       <img class="footer-eu-logo"
             src="assets/imgs/MUTASK_logo_sm.png"
             alt="MUTASK logo">
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
        <?php include __DIR__ . '/footer.php'; ?>
    </footer>
</body>
</html>
