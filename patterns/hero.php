<?php
/**
 * Title: Vaedor Base / Hero
 * Slug: vaedor-theme/hero
 * Categories: vaedor-base
 * Viewport Width: 1440
 * Description: Intro with text, two buttons and an image. Core blocks only.
 */

$vaedor_image = esc_url( get_theme_file_uri( '/assets/images/section-placeholder.svg' ) );
?>
<!-- wp:group {"tagName":"section","align":"full","className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|3-xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|3-xl","left":"var:preset|spacing|xl"}}},"backgroundColor":"background-color-contrast","textColor":"text-color-contrast","layout":{"type":"constrained","contentSize":"100%"}} -->
<section class="wp-block-group alignfull section has-text-color-contrast-color has-background-color-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--3-xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--3-xl);padding-left:var(--wp--preset--spacing--xl)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"section__eyebrow"} -->
<p class="section__eyebrow"><?php esc_html_e( 'Thoughtful digital foundations', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"section__title"} -->
<h1 class="wp-block-heading section__title"><?php esc_html_e( 'A clear headline for the page', 'vaedor-theme' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"section__description"} -->
<p class="section__description"><?php esc_html_e( 'Explain the main value in a concise, useful sentence that supports the primary action.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Primary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Secondary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $vaedor_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
