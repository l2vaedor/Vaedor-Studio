<?php
/**
 * Title: Vaedor Base / Cards
 * Slug: vaedor-theme/cards
 * Categories: vaedor-base
 * Viewport Width: 1440
 * Description: Heading and a responsive grid of three cards. Core blocks only.
 */

$vaedor_image = esc_url( get_theme_file_uri( '/assets/images/section-placeholder.svg' ) );
?>
<!-- wp:group {"tagName":"section","align":"full","className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<section class="wp-block-group alignfull section" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)"><!-- wp:group {"className":"section__head"} -->
<div class="wp-block-group section__head"><!-- wp:paragraph {"className":"section__eyebrow"} -->
<p class="section__eyebrow"><?php esc_html_e( 'Services', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"section__title"} -->
<h2 class="wp-block-heading section__title"><?php esc_html_e( 'A focused set of cards', 'vaedor-theme' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"section__description"} -->
<p class="section__description"><?php esc_html_e( 'Duplicate, remove or reorder cards using the List View.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
<div class="wp-block-group"><?php for ( $vaedor_card = 1; $vaedor_card <= 3; $vaedor_card++ ) : ?><!-- wp:group {"className":"card"} -->
<div class="wp-block-group card"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"card__media"} -->
<figure class="wp-block-image size-large card__media"><img src="<?php echo $vaedor_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"card__body"} -->
<div class="wp-block-group card__body"><!-- wp:paragraph {"className":"card__meta"} -->
<p class="card__meta"><?php echo esc_html( sprintf( /* translators: %d: card number. */ __( 'Category %d', 'vaedor-theme' ), $vaedor_card ) ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"card__title"} -->
<h3 class="wp-block-heading card__title"><?php echo esc_html( sprintf( /* translators: %d: card number. */ __( 'Card title %d', 'vaedor-theme' ), $vaedor_card ) ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"card__content"} -->
<p class="card__content"><?php esc_html_e( 'Summarize the item clearly and keep the action descriptive.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"card__actions"} -->
<p class="card__actions"><a href="#"><?php esc_html_e( 'Learn more', 'vaedor-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --><?php endfor; ?></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
