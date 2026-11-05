# Vaedor Base

A lightweight base theme for client sites and demos. PHP templates, one compiled
stylesheet, core Gutenberg blocks. No page builder, no custom blocks, no settings tables.

Requirements: WordPress 6.6+, PHP 8.0+.

## What lives where

| Concern | Where |
| --- | --- |
| Palette, fonts, font sizes, spacing scale, content/wide widths, shell width, radii, button look | `theme.json` |
| Logo | Customizer → Site Identity (core) |
| Brand colors (accent, text, headings, background) | Customizer → Colors (overrides the `theme.json` palette) |
| Header button, footer description, phone, email, copyright | Customizer → Header / Footer |
| Page content and section layout | Gutenberg, with core blocks (Group, Columns, Cover, Buttons…) |

Customizer values are theme mods. An empty value falls back to `theme.json`.

## Structure

```
functions.php        loads inc/*
inc/setup.php        theme supports, pattern category
inc/enqueue.php      main.min.css + navigation.js (only when a primary menu exists)
inc/customizer.php   the 3 Customizer sections + palette filter
inc/menus.php        menu locations, BEM menu classes
inc/widgets.php      sidebar
patterns/            hero, cards, cta (core blocks only)
assets/scss/         source; assets/css/ is generated
assets/js/navigation.js  mobile menu (aria-expanded, Escape, outside click)
```

## CSS

```sh
npm ci
npm run build   # or: npm run watch
```

Output: `assets/css/main.min.css` (frontend) and `assets/css/editor.min.css` (editor).
Do not edit the generated files. Production needs no Node.js.

`base/_root.scss` only maps short names (`--accent-color`, `--space-md`…) to the
`--wp--preset--*` and `--wp--custom--*` variables that WordPress creates from `theme.json`.
To change a value, change `theme.json`.

Budget: `main.min.css` stays **under 15 KB**. Check with `wc -c assets/css/main.min.css`.

## Class naming (BEM)

- `.site`: page wrapper (sticky footer). One per page.
- `.shell`: centered, padded width container. Modifiers: `.shell--narrow`, `.shell--full`.
- `.section` with `__head`, `__eyebrow`, `__title`, `__description`: a plain page section.
  It has no modifiers. Spacing, background and alignment come from core block settings.
- `.card` with `__media`, `__body`, `__meta`, `__title`, `__link`, `__content`, `__actions`.
  Modifiers sit on `.card` itself: `.card--flat`, `.card--hover`. `.card-grid` is a separate block for listings.
- `.header__*`, `.footer__*`, `.menu--primary|footer`, `.button--outline|text`, `.entry__*`.

Variants are modifiers on the block itself, never wrapper or context classes.

## Accessibility

Skip link, labelled navigation landmarks, `aria-expanded` menu toggle with Escape support,
visible `:focus-visible` outlines, and `prefers-reduced-motion`, which disables transitions and animations.

## Child themes and plugins

A child theme is **only** `theme.json` + `style.css` + a few template/pattern files.
If a child theme needs PHP logic (CPTs, forms, integrations, options), that logic belongs in a plugin.

A demo on this base should take 1–2 days. If it takes longer, the base is still too heavy.
