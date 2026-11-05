<?php
/**
 * Title: Vaedor Base / Media
 * Slug: vaedor-theme/media
 * Categories: vaedor-base
 * Viewport Width: 1440
 */
$image = esc_url( get_theme_file_uri( '/assets/images/section-placeholder.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--media","layout":{"type":"constrained"}} -->
<section class="wp-block-group section section--media"><!-- wp:group {"className":"shell section__body","layout":{"type":"constrained"}} -->
<div class="wp-block-group shell section__body"><!-- wp:group {"className":"section__content","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__content"><!-- wp:paragraph {"className":"section__eyebrow"} -->
<p class="section__eyebrow"><?php esc_html_e( 'Story and image', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"className":"section__title"} -->
<h2 class="wp-block-heading section__title"><?php esc_html_e( 'Pair meaningful content with media', 'vaedor-theme' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"section__description"} -->
<p class="section__description"><?php esc_html_e( 'This section supports rich text and two optional actions without adding layout JavaScript.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Add the page-specific narrative here using standard Gutenberg blocks.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"className":"section__actions"} -->
<div class="wp-block-buttons section__actions"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Primary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Secondary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"section__media","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__media"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $image; ?>" alt=""/><figcaption class="wp-element-caption"><?php esc_html_e( 'Optional image caption.', 'vaedor-theme' ); ?></figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
