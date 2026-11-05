<?php
/**
 * Title: Vaedor Base / FAQ
 * Slug: vaedor-theme/faq
 * Categories: vaedor-base
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"tagName":"section","className":"section section--faq","layout":{"type":"constrained"}} -->
<section class="wp-block-group section section--faq"><!-- wp:group {"className":"shell","layout":{"type":"constrained"}} -->
<div class="wp-block-group shell"><!-- wp:group {"className":"section__head","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__head"><!-- wp:heading {"className":"section__title"} -->
<h2 class="wp-block-heading section__title"><?php esc_html_e( 'Frequently asked questions', 'vaedor-theme' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"section__description"} -->
<p class="section__description"><?php esc_html_e( 'Answer the questions visitors ask before taking the next step.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:group {"className":"section__body faq","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__body faq">
<?php for ( $item = 1; $item <= 3; $item++ ) : ?>
<!-- wp:details {"className":"faq__item"} -->
<details class="wp-block-details faq__item"><summary class="faq__question"><?php echo esc_html( sprintf( __( 'Question %d goes here?', 'vaedor-theme' ), $item ) ); ?></summary><!-- wp:paragraph {"className":"faq__answer"} -->
<p class="faq__answer"><?php esc_html_e( 'Write a direct, useful answer. Native details and summary provide accessible interaction without JavaScript.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->
<?php endfor; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
