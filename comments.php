<?php
/**
 * Comments template.
 *
 * @package Vaedor_Base
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments">
	<?php if ( have_comments() ) : ?>
		<div class="comments__head">
			<h2 class="comments__title">
				<?php
				printf(
					/* translators: %s: number of comments. */
					esc_html( _n( '%s comment', '%s comments', get_comments_number(), 'vaedor-theme' ) ),
					esc_html( number_format_i18n( get_comments_number() ) )
				);
				?>
			</h2>
		</div>

		<div class="comments__body">
			<ol class="comments__list">
				<?php
				wp_list_comments(
					array(
						'avatar_size' => 48,
						'style'       => 'ol',
						'short_ping'  => true,
					)
				);
				?>
			</ol>
		</div>

		<?php the_comments_pagination(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="comments__notice"><?php esc_html_e( 'Comments are closed.', 'vaedor-theme' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
