<?php
/**
 * Menu locations.
 *
 * @package Vaedor_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register navigation menu locations.
 *
 * @return void
 */
function vaedor_register_menus() {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'vaedor-theme' ),
			'footer'  => esc_html__( 'Footer menu', 'vaedor-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'vaedor_register_menus' );

/** Keep the core Walker and its accessibility attributes; add BEM classes only. */
function vaedor_menu_item_classes( $classes, $item, $args ) {
	if ( in_array( $args->theme_location, array( 'primary', 'footer' ), true ) ) {
		$classes[] = 'menu__item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'vaedor_menu_item_classes', 10, 3 );

function vaedor_menu_link_attributes( $atts, $item, $args ) {
	if ( in_array( $args->theme_location, array( 'primary', 'footer' ), true ) ) {
		$atts['class'] = trim( ( $atts['class'] ?? '' ) . ' menu__link' );
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'vaedor_menu_link_attributes', 10, 3 );
