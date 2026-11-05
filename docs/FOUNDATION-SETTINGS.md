# Vaedor Base foundation settings

**Appearance → Customize → Vaedor Base** requires `edit_theme_options` and contains:

- Цветове; Layout и отстояния; Основен текст; Заглавия H1–H6.
- Бутони; Форми; Карти.
- Секции — Hero, Content, Cards, Media, FAQ and CTA.
- Хедър; Футър.

Controls point directly to keys in the existing option arrays. Reset requires confirmation, changes only the current Customizer section and remains unpublished until Publish. Existing values are preserved; defaults are used only when values are absent. No automatic reset occurs during deployment.

## Typography and components

Base text defaults to 14px / 1.3 / 0.2px. Size is bounded 9–18px, line height 0.7–2 in 0.1 steps, and letter spacing −1–1px in 0.1 steps. H1–H6 have fixed responsive sizes independent of body size: desktop 56/40/30/24/20/18px and mobile minimums 36/30/24/21/18/16px. Each heading exposes only line height, letter spacing and uppercase.

Buttons expose radius, uppercase, minimum width and four independent padding values. Text links are exempt from button dimensions. Forms and cards have compact component settings. Color values are validated hex; select values use allowlists and numeric values are clamped and aligned to their declared step.

CSS-token controls use the standard Customizer `postMessage` preview without writing to the database. Section, header and footer controls use preview refresh. Public changes appear only after Publish. Control assets load only in Customizer; editor controls load only in Gutenberg.

## Sections and content

Six core-block patterns live in the Vaedor Base category. Select the outer section Group to choose background (light/contrast), width (normal/narrow) and spacing (normal/compact). Leave a control at Default to inherit section settings, then General, then theme defaults. Explicit classes remain in page content and are not overwritten by global changes.

Hero supports content and media; Content supports prose, lists, quotes and process steps; Cards uses responsive CSS Grid; Media supports either image position; FAQ uses native Details; CTA supports navigation links. Legacy layouts and existing custom Hero content are retained. Contact composition uses Content and Columns; insert the chosen plugin's form block/shortcode. No form plugin is activated or installed by the theme. Legacy Contact and Posts patterns remain renderable.

The original sixteen palette values remain supported, with explicit heading, on-accent and border tokens. Existing stored colors take precedence over new fallback colors. Content belongs in pages, except global header CTA and footer identity text. Copyright supports `{year}` and `{site}`.

## Files and build

The declarative schema, validation and CSS output remain in `inc/admin/settings-*.php`; `inc/customizer.php` registers the interface. The editor integration is `assets/js/section-editor.js`; Customizer synchronization is split between `customizer-controls.js` and `customizer-preview.js`. None of these scripts adds section functionality on the frontend. SCSS lives in `assets/scss`; `npm ci` then `npm run build` emits `assets/css/main.min.css` and `assets/css/editor.min.css`. Production uses compiled CSS and needs no Node tooling.

Child themes can override assets via WordPress theme-file resolution and template parts normally. A child stylesheet should depend on the `vaedor-base` handle and enqueue after it to override tokens predictably. No project-specific child theme is shipped.

## Validation

`tests/qa-customizer.php` checks the panel and all fifteen sections, existing option bindings, transports, bounds, negative and zero values, one-field save isolation and section override priority. Any temporary save is restored in a `finally` block. `tests/qa-foundation.php` retains the lower-level foundation checks. Run these against the named local installation only.
