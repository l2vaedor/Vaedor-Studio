<?php
/**
 * Section heading. Args: title, eyebrow, description (plain text), heading (h1–h6).
 *
 * @package Vaedor_Base
 */
$vaedor_heading = in_array( $args['heading'] ?? 'h2', array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ), true ) ? ( $args['heading'] ?? 'h2' ) : 'h2';
if ( empty( $args['title'] ) && empty( $args['eyebrow'] ) && empty( $args['description'] ) ) {
	return;
}
?>
<div class="section__head">
	<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
		<p class="section__eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
	<?php endif; ?>
	<?php if ( ! empty( $args['title'] ) ) : ?>
		<?php printf( '<%1$s class="section__title">%2$s</%1$s>', esc_attr( $vaedor_heading ), esc_html( $args['title'] ) ); ?>
	<?php endif; ?>
	<?php if ( ! empty( $args['description'] ) ) : ?>
		<p class="section__description"><?php echo esc_html( $args['description'] ); ?></p>
	<?php endif; ?>
</div>
