# Website content

This site is built from plain **Markdown** files. There is no database and no
login — to change the site you edit text files in this repository, and the
changes go live automatically a few seconds after you commit.

## Editing a page

1. Open the `content/` folder.
2. Click the page you want to change (e.g. `about.md`), then the ✏️ pencil icon.
3. Edit the text and click **Commit changes**.

That's it — the live site updates on its own.

## Adding a new page

Create a new file in `content/`, for example `content/team.md`. The filename
(without `.md`) becomes the URL, so this page would be at `/team`. Start the
file with a front-matter block:

```markdown
---
title: Our Team
order: 4
---

# Our Team

Your text here...
```

The page appears in the top menu automatically. No other files need changing.

### Front-matter options

| Key     | What it does                                              |
| ------- | --------------------------------------------------------- |
| `title` | Label shown in the menu and the browser tab               |
| `order` | Menu position (lower numbers come first)                  |
| `nav`   | Set to `false` to hide from the menu but keep it reachable |

### Filename rules

Use only lowercase letters, numbers and dashes in filenames:
`about.md`, `our-team.md`, `prices-2026.md`. Anything else is ignored.

## Markdown quick reference

```markdown
# Big heading
## Smaller heading

**bold**  *italic*

- bullet list item
- another item

[a link](https://example.com)

![an image](/assets/photo.jpg)
```

## Changing the site name, colours, footer

- Site name, tagline, footer and default page: `config.php`
- Colours and small style tweaks: `assets/style.css`

## How it works (for developers)

`index.php` discovers every `.md` file in `content/`, reads its front matter,
builds the navigation, and renders the requested page through
`templates/layout.php`. Clean URLs are handled by `.htaccess` (mod_rewrite).
Markdown is converted to HTML by the vendored `Parsedown.php`. Styling is the
classless [simple.css](https://simplecss.org) plus `assets/style.css`.
