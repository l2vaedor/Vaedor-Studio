# Vaedor Base

Vaedor Base is a lightweight presentation layer for reusable client websites. It provides layout, typography, buttons, forms, cards, header/footer, basic sections and core Gutenberg styling. Business logic belongs in Vaedor Components or a project-specific plugin.

Requirements: WordPress 6.6+, PHP 8.0+. There is no ACF dependency, page builder, custom React block library, frontend framework or external font request.

## Development and production

`theme.json` and the Vaedor Base design-system options jointly own palette, typography presets, spacing and editor widths. SCSS is development source only:

```sh
npm ci
npm run build
```

The build generates minified `assets/css/main.min.css` and `assets/css/editor.min.css`. Production requires no Node.js, npm, Sass, Vite, Webpack or Gulp. Do not edit generated CSS directly and do not deploy `node_modules`.

The frontend loads one theme stylesheet. Sections require no JavaScript. The existing, small navigation script loads only for the mobile theme menu.

## Content and settings boundary

- Gutenberg = actual page content: headings, text, images, links, FAQ answers, contact details and queries.
- Vaedor Base = global presentation defaults and pattern availability.
- An explicit BEM modifier on a section instance overrides its section setting; a section setting overrides General; General overrides the theme fallback.

No page-specific content is stored as a theme option. Disabling a section hides its pattern from the normal inserter but never deletes or prevents rendering existing content.

## Vaedor Base settings

Global visual settings are available under **Appearance → Customize → Vaedor Base**. Existing `vaedor_base_*` option arrays remain the data store; moving the interface does not migrate, reset or rewrite saved values. Each Customizer section has a scoped reset that remains a pending changeset until the standard Publish action.

See [Foundation settings](docs/FOUNDATION-SETTINGS.md) for the current controls, defaults, tokens, editor overrides, preview behavior and validation. Existing saved values and page content are preserved. CSS tokens preview through `postMessage`; structural controls use the normal Customizer refresh lifecycle.

## Vaedor Base Sections

All patterns are in the **Vaedor Base** inserter category and use editable WordPress core blocks plus BEM classes. Core `wp-block-*` classes remain intact.

### Hero

Hero is now the theme-owned `vaedor/hero` Gutenberg block (inserter: **Vaedor Base → Vaedor Hero**), automatically available when the theme is activated. Edit text directly and use its inspector for links, image/alt text, heading level and layout defaults. The former Hero pattern is hidden; existing core-block Hero content still renders. It stores semantic HTML as a theme-switch fallback and applies global defaults on the server. Only editor JavaScript is required. Other seven sections remain core-block patterns.

Purpose: primary page introduction. Supports eyebrow, title, description, two actions, optional image and supporting text. Layouts: content-only, centered, split, media-left and media-right; ratios 50/50, 60/40 and 40/60; compact/default/large sizes and five media ratios. Modifiers include `.section--hero-layout-*`, `.section--ratio-*`, `.section--hero-size-*` and `.section--media-ratio-*`. Global settings control those variants, alignment, background and availability. No sliders, autoplay, parallax, particles or animation framework.

### Content

Purpose: readable long-form page content. Supports eyebrow, title, subtitle, description, paragraphs, lists, quotes, links and an optional action. Layouts: single, narrow, two columns and centered. Modifiers include `.section--content-layout-*` plus common alignment/background/spacing modifiers. No large layout library or project-specific content types.

### Cards

Purpose: small reusable collections. Each `.card` supports optional image, meta/eyebrow, title, description and link. CSS Grid provides 2, 3, 4 and auto-fit columns; cards can be default, bordered, surface, vertical or horizontal. Modifiers include `.section--cards-columns-*`, `.section--cards-style-*`, `.section--cards-layout-*`, `.section--cards-image-*` and `.section--cards-equal-height`. No carousel, masonry JavaScript, AJAX, filtering, sorting or load more.

### Media

Purpose: pair rich content and actions with one image and optional caption. Media can be left or right, use 50/50, 40/60 or 60/40 proportions, align vertically at start/center/end and use the shared media ratios. Modifiers include `.section--media-position-*`, `.section--ratio-*`, `.section--vertical-*` and `.section--media-ratio-*`. No gallery or slider functionality.

### CTA

Purpose: a focused call to action with optional eyebrow, title, description and two links. Layouts are centered, inline and split; sizes are compact/default/large. Modifiers include `.section--cta-layout-*` and `.section--cta-size-*`. No popup, modal, newsletter API or tracking system.

### FAQ

Purpose: short question-and-answer groups. It uses the core Details block and native `<details>/<summary>`, in one or two columns with default, bordered or separated styles. Modifiers include `.section--faq-columns-*` and `.section--faq-style-*`. The first item can be opened server-side without frontend JavaScript. No search, category system, AJAX or accordion library.

### Contact

Purpose: present page-specific contact details beside a plugin-owned form area. It supports address, `tel:`, `mailto:`, working hours and social links; layouts are details+form, form+details, centered and details-grid with three ratios. Modifiers include `.section--contact-layout-*`, `.section--ratio-*` and `.section--contact-hide-*`. Settings only control presentation defaults—not the actual address, phone or email. The theme does not submit forms, send mail, configure SMTP/CRM/CAPTCHA or call external APIs.

### Posts

Purpose: display posts through the core Query Loop. The `.post-card` structure includes media, meta, title, excerpt and action. Layouts are list and 2/3/4 columns, with visibility controls for image, date, author, categories, excerpt and read-more. Modifiers include `.section--posts-layout-*` and `.section--posts-hide-*`. Query/category filtering remains an instance-level Query Loop choice. No AJAX filters, live search, infinite scroll or load-more script.

## Common section structure and modifiers

The generic structure uses `.section`, `.shell`, `.section__head`, `.section__eyebrow`, `.section__title`, `.section__subtitle`, `.section__description`, `.section__body`, `.section__media`, `.section__actions` and `.section__footer` as needed.

Common instance modifiers are `.section--compact`, `.section--spacious`, `.section--align-left`, `.section--align-center`, `.section--align-right`, `.section--surface`, `.section--contrast`, `.section--narrow`, `.section--wide` and `.section--full`. Add them in Gutenberg’s Advanced → Additional CSS class(es) to override a default for one instance. Arbitrary inline design values are intentionally not part of this system.

## SCSS architecture

- Generic section rules: `assets/scss/layout/_section.scss`
- Reusable card: `assets/scss/components/_card.scss`
- Variants: `assets/scss/sections/_hero.scss`, `_content.scss`, `_cards.scss`, `_media.scss`, `_cta.scss`, `_faq.scss`, `_contact.scss`, `_posts.scss`

Editor CSS imports the same content partials, so widths, spacing, cards, media, CTA, FAQ and post grids remain recognizable in Gutenberg without trying to reproduce the entire frontend chrome.

## Accessibility and markup

Navigation actions are links, images use the normal core Image alt-text workflow, FAQ interaction is native, and contact links use their real protocols. Choose heading levels for the page hierarchy; `.section__title` works on any heading element.

Do not add a blank line immediately after an opening HTML tag or immediately before its closing tag. Keep project classes BEM-based and retain WordPress core classes.

## Verification

After changes, run the Sass build and PHP lint. Check all eight patterns in the Vaedor Base inserter category, their block validity and editor appearance; save, sanitize and reset every settings form; then test mobile, tablet and desktop frontend layouts. Confirm the production theme contains compiled CSS and no section-specific frontend JavaScript.
