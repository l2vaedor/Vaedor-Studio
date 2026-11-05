<?php
/**
 * Post card template part.
 *
 * @package Vaedor_Base
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--post post-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="card__media post-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<?php the_post_thumbnail( 'medium_large', array( 'class' => 'card__image', 'sizes' => '(max-width: 767px) 100vw, (max-width: 1199px) 50vw, 33vw' ) ); ?>
		</a>
	<?php endif; ?>

	<div class="card__body">
		<div class="card__meta post-card__meta">
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</div>

		<h2 class="card__title post-card__title">
			<a class="card__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<div class="card__content post-card__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<div class="card__actions post-card__actions">
			<a class="button button--text" href="<?php the_permalink(); ?>">
				<span class="button__label"><?php esc_html_e( 'Read more', 'vaedor-theme' ); ?></span>
			</a>
		</div>
	</div>
</article>
