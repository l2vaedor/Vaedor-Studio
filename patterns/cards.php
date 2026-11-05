<?php
/**
 * Title: Vaedor Base / Cards
 * Slug: vaedor-theme/cards
 * Categories: vaedor-base
 * Viewport Width: 1440
 */
$image = esc_url( get_theme_file_uri( '/assets/images/section-placeholder.svg' ) );
?>
<!-- wp:group {"tagName":"section","className":"section section--cards","layout":{"type":"constrained"}} -->
<section class="wp-block-group section section--cards"><!-- wp:group {"className":"shell","layout":{"type":"constrained"}} -->
<div class="wp-block-group shell"><!-- wp:group {"className":"section__head","layout":{"type":"constrained"}} -->
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
<!-- wp:group {"className":"section__body cards","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__body cards">
<?php for ( $card = 1; $card <= 3; $card++ ) : ?>
<!-- wp:group {"className":"card","layout":{"type":"constrained"}} -->
<div class="wp-block-group card"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"card__media"} -->
<figure class="wp-block-image size-large card__media"><img src="<?php echo $image; ?>" alt=""/></figure>
<!-- /wp:image -->
<!-- wp:paragraph {"className":"card__meta"} -->
<p class="card__meta"><?php echo esc_html( sprintf( __( 'Category %d', 'vaedor-theme' ), $card ) ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3,"className":"card__title"} -->
<h3 class="wp-block-heading card__title"><?php echo esc_html( sprintf( __( 'Card title %d', 'vaedor-theme' ), $card ) ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"card__description"} -->
<p class="card__description"><?php esc_html_e( 'Summarize the item clearly and keep the action descriptive.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"className":"card__actions"} -->
<p class="card__actions"><a href="#"><?php esc_html_e( 'Learn more', 'vaedor-theme' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endfor; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
