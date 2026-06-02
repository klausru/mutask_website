# Website content of MUTASK

https://www.mutask.eu

This site is built from plain **Markdown** files. There is no database and no
login. Public pages live in `content/`; repository workflow notes belong in
this README, not in public website content.

If you have direct write access to this repository, changes go live after your
commit is merged to `main`. If you do not have direct write access, use a fork
and open a pull request.

## Editing a page

1. Open the `content/` folder.
2. Click the page you want to change (e.g. `about.md`), then the ✏️ pencil icon.
3. Edit the text and click **Commit changes**.

That's it — the live site updates on its own.

## Fork-based contribution workflow

Use this workflow if you cannot push directly to `klausru/mutask_website`.

```bash
cd /path/to/mutask_website
git remote add fork git@github.com:YOUR-USER/mutask_website.git
git push -u fork your-branch-name
```

Then open a pull request from `YOUR-USER:your-branch-name` to
`klausru:main`.

With GitHub CLI:

```bash
gh auth login -h github.com
gh repo fork klausru/mutask_website --clone=false
git remote add fork git@github.com:YOUR-USER/mutask_website.git
git push -u fork your-branch-name
gh pr create --repo klausru/mutask_website --head YOUR-USER:your-branch-name --base main
```

## Local preview

A plain Markdown preview shows only the Markdown content. It will not apply the
site template from `templates/layout.php`, the navigation, or styling from
`assets/style.css`.

To preview the actual site locally, run:

```bash
php -S 127.0.0.1:8765
```

Then open `http://127.0.0.1:8765/?page=home`,
`http://127.0.0.1:8765/?page=about`, `http://127.0.0.1:8765/?page=team`, or
`http://127.0.0.1:8765/?page=contact`.

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
