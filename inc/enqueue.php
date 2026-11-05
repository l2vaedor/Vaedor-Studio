<?php
/**
 * Production assets.
 *
 * @package Vaedor_Base
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vaedor_asset_version( $relative_path ) {
	$path = get_theme_file_path( $relative_path );
	return is_file( $path ) ? (string) filemtime( $path ) : wp_get_theme()->get( 'Version' );
}

function vaedor_enqueue_assets() {
	$css = '/assets/css/main.min.css';
	wp_enqueue_style( 'vaedor-base', get_theme_file_uri( $css ), array(), vaedor_asset_version( $css ) );

	if ( has_nav_menu( 'primary' ) ) {
		$js = '/assets/js/navigation.js';
		wp_enqueue_script( 'vaedor-navigation', get_theme_file_uri( $js ), array(), vaedor_asset_version( $js ), array( 'strategy' => 'defer', 'in_footer' => true ) );
	}

	// Core's progressive enhancement is needed only for threaded comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vaedor_enqueue_assets' );
