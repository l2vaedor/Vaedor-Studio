<?php
/**
 * Widget areas.
 *
 * @package Vaedor_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the primary sidebar.
 *
 * @return void
 */
function vaedor_register_sidebars() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary sidebar', 'vaedor-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Widgets shown beside supported content templates.', 'vaedor-theme' ),
			'before_widget' => '<section id="%1$s" class="sidebar__widget widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="sidebar__title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vaedor_register_sidebars' );
