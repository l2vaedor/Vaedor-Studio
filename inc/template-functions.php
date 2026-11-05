<?php
/**
 * Presentation helpers.
 *
 * @package Vaedor_Base
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vaedor_get_main_classes( $has_sidebar = false ) {
	return $has_sidebar ? 'main main--sidebar' : 'main';
}

function vaedor_posts_pagination() {
	the_posts_pagination(
		array(
			'class' => 'pagination',
			'mid_size' => 1,
			'prev_text' => esc_html__( 'Previous', 'vaedor-theme' ),
			'next_text' => esc_html__( 'Next', 'vaedor-theme' ),
		)
	);
}
