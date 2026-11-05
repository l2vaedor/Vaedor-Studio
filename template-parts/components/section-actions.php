<?php
/**
 * Section actions. Args: actions => array of label, url and optional variant.
 *
 * @package Vaedor_Base
 */
if ( empty( $args['actions'] ) || ! is_array( $args['actions'] ) ) {
	return;
}
?>
<div class="section__actions">
	<?php foreach ( $args['actions'] as $vaedor_action ) : ?>
		<?php
		if ( empty( $vaedor_action['label'] ) || empty( $vaedor_action['url'] ) ) {
			continue;
		}
		$vaedor_variant = in_array( $vaedor_action['variant'] ?? 'primary', array( 'primary', 'secondary', 'outline', 'text' ), true ) ? ( $vaedor_action['variant'] ?? 'primary' ) : 'primary';
		?>
		<a class="button button--<?php echo esc_attr( $vaedor_variant ); ?>" href="<?php echo esc_url( $vaedor_action['url'] ); ?>">
			<span class="button__label"><?php echo esc_html( $vaedor_action['label'] ); ?></span>
		</a>
	<?php endforeach; ?>
</div>
