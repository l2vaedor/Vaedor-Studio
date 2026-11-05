<?php
/**
 * Primary sidebar.
 *
 * @package Vaedor_Base
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside class="sidebar" aria-label="<?php esc_attr_e( 'Sidebar', 'vaedor-theme' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
