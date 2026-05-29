<?php
/**
 * config.php — site-wide settings.
 * Edit the values below; nothing else here needs changing.
 */

// Shown in the header and browser tab.
const SITE_NAME = 'MUTASK';

// Short tagline under the site name (set to '' to hide).
const SITE_TAGLINE = 'Multimodal Translation and Adaptation of Scientific Knowledge for Global Accessibility';

// Which page loads at the root URL "/". Must match a file in /content
// without the .md extension (so 'home' => content/home.md).
const DEFAULT_PAGE = 'home';

// Footer text. Markdown/HTML not parsed here, kept plain.
const SITE_FOOTER = '© ' . '2026 MUTASK';
