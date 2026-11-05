<?php
/**
 * Vaedor Base functions and definitions.
 *
 * @package Vaedor_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vaedor_includes = array(
	'/inc/setup.php',
	'/inc/menus.php',
	'/inc/widgets.php',
	'/inc/enqueue.php',
	'/inc/template-functions.php',
	'/inc/sections.php',
	'/inc/admin/settings-config.php',
	'/inc/admin/settings-validate.php',
	'/inc/customizer.php',
	'/inc/admin/settings-output.php',
	'/inc/hero-block.php',
);

foreach ( $vaedor_includes as $vaedor_file ) {
	require_once get_theme_file_path( $vaedor_file );
}
