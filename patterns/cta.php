<?php
/**
 * Title: Vaedor Base / CTA
 * Slug: vaedor-theme/cta
 * Categories: vaedor-base
 * Viewport Width: 1200
 * Description: Centered call to action with two buttons. Core blocks only.
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"section","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","right":"var:preset|spacing|xl","bottom":"var:preset|spacing|2-xl","left":"var:preset|spacing|xl"}}},"backgroundColor":"secondary-background-color","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull section has-secondary-background-color-background-color has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-right:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--2-xl);padding-left:var(--wp--preset--spacing--xl)"><!-- wp:paragraph {"align":"center","className":"section__eyebrow"} -->
<p class="has-text-align-center section__eyebrow"><?php esc_html_e( 'Ready when you are', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"section__title"} -->
<h2 class="wp-block-heading has-text-align-center section__title"><?php esc_html_e( 'Give the visitor one clear next step', 'vaedor-theme' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"section__description"} -->
<p class="has-text-align-center section__description"><?php esc_html_e( 'Keep this message short and connect it directly to the actions.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Primary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'Secondary action', 'vaedor-theme' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->
