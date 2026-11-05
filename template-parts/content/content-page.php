<?php
/**
 * Page content template part.
 *
 * @package Vaedor_Base
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--page' ); ?>>
	<div class="shell">
		<header class="entry__header">
			<?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
		</header>

		<div class="entry__content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<nav class="pagination pagination--pages" aria-label="' . esc_attr__( 'Page', 'vaedor-theme' ) . '">',
					'after'  => '</nav>',
				)
			);
			?>
		</div>
	</div>
</article>
