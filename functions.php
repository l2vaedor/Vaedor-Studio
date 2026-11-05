<?php
/**
 * Vaedor Base functions and definitions.
 *
 * Base stays presentational: design values live in theme.json, a few brand
 * options live in the Customizer. Anything with business logic belongs in a plugin.
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
	'/inc/customizer.php',
);

foreach ( $vaedor_includes as $vaedor_file ) {
	require_once get_theme_file_path( $vaedor_file );
}
