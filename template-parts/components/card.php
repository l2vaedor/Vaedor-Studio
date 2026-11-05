<?php
/**
 * Generic card. Args: title, content (safe HTML), image_id, url, label.
 *
 * @package Vaedor_Base
 */
?>
<article class="card">
	<?php if ( ! empty( $args['image_id'] ) ) : ?>
		<div class="card__media"><?php echo wp_get_attachment_image( absint( $args['image_id'] ), 'medium_large', false, array( 'class' => 'card__image', 'sizes' => '(min-width: 1024px) 33vw, (min-width: 768px) 50vw, 100vw' ) ); ?></div>
	<?php endif; ?>
	<div class="card__body">
		<?php if (!empty($args['icon'])) : ?><span class="card__icon" aria-hidden="true"><?php echo esc_html($args['icon']); ?></span><?php endif; ?>
		<?php if (!empty($args['meta'])) : ?><p class="card__meta"><?php echo esc_html($args['meta']); ?></p><?php endif; ?>
		<?php if ( ! empty( $args['title'] ) ) : ?>
			<h3 class="card__title"><?php echo esc_html( $args['title'] ); ?></h3>
		<?php endif; ?>
		<?php if ( ! empty( $args['content'] ) ) : ?>
			<div class="card__content"><?php echo wp_kses_post( $args['content'] ); ?></div>
		<?php endif; ?>
		<?php if ( ! empty( $args['url'] ) && ! empty( $args['label'] ) ) : ?>
			<div class="card__actions">
				<a class="button button--text" href="<?php echo esc_url( $args['url'] ); ?>"><span class="button__label"><?php echo esc_html( $args['label'] ); ?></span></a>
			</div>
		<?php endif; ?>
	</div>
</article>
