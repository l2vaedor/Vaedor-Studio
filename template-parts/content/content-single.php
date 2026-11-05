<?php
/**
 * Single post content template part.
 *
 * @package Vaedor_Base
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--single' ); ?>>
	<div class="shell">
		<header class="entry__header">
			<div class="entry__meta">
				<time class="entry__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			</div>

			<?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="entry__media">
				<?php the_post_thumbnail( 'large', array( 'class' => 'entry__image', 'sizes' => '(max-width: 760px) 100vw, 760px' ) ); ?>
			</figure>
		<?php endif; ?>

		<div class="entry__content">
			<?php
			the_content();
			wp_link_pages( array( 'before' => '<nav class="pagination" aria-label="' . esc_attr__( 'Page', 'vaedor-theme' ) . '">', 'after' => '</nav>' ) );
			?>
		</div>
	</div>
</article>
