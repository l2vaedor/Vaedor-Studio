# Vaedor Base Design System

## Shared color palette

The palette retains the eight core colors and their contrast variants, plus explicit `heading-color`, `on-accent-color` and `border-color` tokens. CSS custom properties use the same names with `--` prefixes and Gutenberg receives the validated palette.

All components consume this palette directly. Headings use text color, descriptions use secondary text, links and focus rings use accent, and filled buttons pair accent backgrounds with background-colored text. Hover uses secondary accent. Borders are derived from text/background colors. Forms keep focus outlines and error indicators without a separate configurable state palette.

`.section--contrast` reassigns all eight local properties to their contrast counterparts, so cards, links, buttons and form fields inherit the same environment. Component color pickers have been removed; geometry and typography settings remain available. Saved legacy brand colors are mapped on read until the new Colors form is saved; page content is not rewritten.

`Appearance → Customize → Vaedor Base` controls global presentation; Gutenberg controls page content and local section overrides. The Customizer exposes fifteen flat sections under one panel. Existing `vaedor_base_*` option arrays remain the storage layer.

## Data and validation

Each group is one associative WordPress option. Cards appearance is stored in `vaedor_base_cards`; the Cards section is stored separately in `vaedor_base_cards_section`. Customizer settings use `type => option` and address individual array keys, so one field never replaces its siblings. Defaults come from the declarative schema. Selects are allowlisted, checkboxes become booleans, numbers are bounded and step-aligned, and colors must be valid hex. A scoped Customizer reset changes pending values only and waits for Publish.

## Runtime tokens

Shadow colors are shared by text and box shadows. Subtle card shadows use `--shadow-color`; stronger/hover shadows use `--secondary-shadow-color`. Opacity belongs to the shadow style, not an extra color setting. Example:

```css
.example__title {
    text-shadow: 0 2px 4px color-mix(in srgb, var(--shadow-color) 20%, transparent);
}
.example__panel {
    box-shadow: 0 12px 32px color-mix(in srgb, var(--secondary-shadow-color) 14%, transparent);
}
```

The theme turns saved values into one compact WordPress inline stylesheet attached to `vaedor-base`. It contains `:root` custom properties for shell/content widths, responsive page padding, sidebar/grid gaps, palette/contrast colors, type scale, spacing, radii, motion, buttons, forms, cards, header and footer. Components consume these semantic properties; settings do not generate a selector per field.

The same token output is supplied to the block editor. A dynamic `theme.json` patch synchronizes its controlled palette, font families, font sizes, spacing scale and content/wide widths. Gutenberg switches control arbitrary values and wide/full alignment availability without changing already-saved content.

Token groups:

- Foundation: `--color-*`, `--font-*`, `--space-*`, `--radius-*`, `--border-width`, `--transition-base`.
- Layout: `--shell-width`, `--content-width-*`, responsive `--page-padding-*`, `--sidebar-*`, `--grid-gap`.
- Buttons: geometry, type and primary/secondary/outline/text state tokens under `--button-*`.
- Forms: inputs, labels, focus/error/disabled states and field rhythm under `--input-*`, `--label-*` and `--field-gap`.
- Cards: surface, border, radius, padding, shadow, media and content tokens under `--card-*`.
- Chrome: header/logo/navigation tokens under `--header-*`, `--logo-*`, `--nav-*`; footer tokens under `--footer-*`.

Compiled `assets/css/main.min.css` contains a complete default token set. Dynamic output only overrides it, so the theme remains usable if no option has ever been stored or the inline output is unavailable.

## Settings map

- General selects site/content defaults, section defaults, radius and motion presets.
- Layout owns wrapper, shell and content widths, responsive page padding, sidebar ratios and grid gap.
- Colors owns controlled brand, surface, type, state, link and contrast palettes.
- Typography owns system-safe font stacks, bounded base/headings sizes and supporting text sizes; it never requests a remote font.
- Spacing selects one coherent XS–3XL scale.
- Buttons owns geometry plus accessible color states for the four BEM variants.
- Forms owns presentation only; submission, mail, validation services and CAPTCHA remain plugin concerns.
- Cards owns the reusable `.card` appearance, while the Cards section owns only layout and section defaults.
- Header and Footer own presentation and layout. Logo upload, menus, widgets and content remain native WordPress/project concerns.
- Sections owns availability and presentation defaults for the eight Gutenberg patterns.
- Gutenberg constrains editor choices to the same palette, sizes, spacing and layout tokens.

## Priority and extension

Section priority is: explicit instance BEM modifier, section default, General default, compiled fallback. Add instance modifiers in Gutenberg’s Additional CSS class field. Project-specific styling should consume or override semantic properties in a child theme/project stylesheet; do not add business data or arbitrary CSS fields to Base settings.

Performance and accessibility are mandatory theme behavior, not user-disableable options. No font service, framework, jQuery or section-specific frontend JavaScript is loaded. Header navigation keeps its small existing progressive-enhancement script.
