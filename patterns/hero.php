<?php
/**
 * Title: Vaedor Base / Hero
 * Slug: vaedor-theme/hero
 * Categories: vaedor-base
 * Viewport Width: 1440
 */
$image = esc_url( get_theme_file_uri( '/assets/images/section-placeholder.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group section section--hero"><!-- wp:group {"className":"shell section__body","layout":{"type":"constrained"}} -->
<div class="wp-block-group shell section__body"><!-- wp:group {"className":"section__content","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__content"><!-- wp:paragraph {"className":"section__eyebrow"} -->
<p class="section__eyebrow"><?php esc_html_e( 'Thoughtful digital foundations', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"className":"section__title"} -->
<h1 class="wp-block-heading section__title"><?php esc_html_e( 'A clear headline for the page', 'vaedor-theme' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"section__description"} -->
<p class="section__description"><?php esc_html_e( 'Explain the main value in a concise, useful sentence that supports the primary action.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"section__actions"} -->
<div class="wp-block-buttons section__actions"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Primary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Secondary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"className":"section__footer"} -->
<p class="section__footer"><?php esc_html_e( 'Optional supporting text belongs here.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"section__media"} -->
<figure class="wp-block-image size-large section__media"><img src="<?php echo $image; ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
