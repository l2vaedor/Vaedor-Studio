<?php
/**
 * Title: Vaedor Base / Posts
 * Slug: vaedor-theme/posts
 * Categories: vaedor-base
 * Viewport Width: 1440
 */
$settings = vaedor_base_get_settings( 'posts' );
$order = 'oldest' === $settings['order'] ? 'asc' : 'desc';
?>
<!-- wp:group {"tagName":"section","className":"section section--posts","layout":{"type":"constrained"}} -->
<section class="wp-block-group section section--posts"><!-- wp:group {"className":"shell","layout":{"type":"constrained"}} -->
<div class="wp-block-group shell"><!-- wp:group {"className":"section__head","layout":{"type":"constrained"}} -->
<div class="wp-block-group section__head"><!-- wp:heading {"className":"section__title"} -->
<h2 class="wp-block-heading section__title"><?php esc_html_e( 'Latest posts', 'vaedor-theme' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"section__description"} -->
<p class="section__description"><?php esc_html_e( 'Choose categories and other query filters directly in the Query Loop block.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:query {"query":{"perPage":<?php echo (int) $settings['number']; ?>,"pages":0,"offset":0,"postType":"post","order":"<?php echo esc_attr( $order ); ?>","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"className":"section__body posts"} -->
<div class="wp-block-query section__body posts"><!-- wp:post-template {"className":"posts__grid"} -->
<!-- wp:group {"tagName":"article","className":"post-card","layout":{"type":"constrained"}} -->
<article class="wp-block-group post-card"><!-- wp:post-featured-image {"isLink":true,"className":"post-card__media"} /-->
<!-- wp:group {"className":"post-card__meta","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group post-card__meta"><!-- wp:post-date /--><!-- wp:post-author-name /--><!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group -->
<!-- wp:post-title {"level":3,"isLink":true,"className":"post-card__title"} /-->
<!-- wp:post-excerpt {"moreText":"","className":"post-card__excerpt"} /-->
<!-- wp:read-more {"content":"<?php echo esc_attr__( 'Read more', 'vaedor-theme' ); ?>","className":"post-card__actions"} /--></article>
<!-- /wp:group -->
<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'No posts found.', 'vaedor-theme' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
