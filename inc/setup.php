<?php
/**
 * Theme setup.
 *
 * @package Vaedor_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports and editor styles.
 *
 * @return void
 */
function vaedor_setup() {
	load_theme_textdomain( 'vaedor-theme', get_theme_file_path( '/languages' ) );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_editor_style( 'assets/css/editor.min.css' );
}
add_action( 'after_setup_theme', 'vaedor_setup' );

/**
 * Set a readable content width for legacy embeds.
 *
 * @return void
 */
function vaedor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vaedor_content_width', 760 );
}
add_action( 'after_setup_theme', 'vaedor_content_width', 0 );

/** Register the category used by theme patterns. */
function vaedor_register_pattern_category() {
	register_block_pattern_category( 'vaedor-base', array( 'label' => __( 'Vaedor Base', 'vaedor-theme' ) ) );
}
add_action( 'init', 'vaedor_register_pattern_category' );
