<?php
/** Theme-owned Hero block; editor assets never load on the frontend. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
function vaedor_register_hero_block() {
 $path = get_theme_file_path( '/blocks/hero/editor.js' );
 wp_register_script( 'vaedor-hero-editor', get_theme_file_uri( '/blocks/hero/editor.js' ), array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components' ), filemtime( $path ), true );
 $defaults = vaedor_base_get_section_settings( 'hero' );
 foreach ( array( 'alignment', 'background' ) as $key ) { $defaults[$key] = vaedor_base_resolved_setting( 'hero', $key ); }
 wp_add_inline_script( 'vaedor-hero-editor', 'window.vaedorHero=' . wp_json_encode( array( 'defaults' => $defaults, 'enabled' => (bool) $defaults['enabled'] ) ) . ';', 'before' );
 register_block_type( get_theme_file_path( '/blocks/hero' ), array( 'render_callback' => 'vaedor_render_hero_block' ) );
}
add_action( 'init', 'vaedor_register_hero_block' );
add_filter( 'block_categories_all', function( $categories ) {
 foreach ( $categories as $category ) { if ( 'vaedor-base' === $category['slug'] ) { return $categories; } }
 $categories[] = array( 'slug' => 'vaedor-base', 'title' => 'Vaedor Base' );
 return $categories;
} );
function vaedor_render_hero_block( $attributes, $content ) {
 // Saved semantic HTML is retained as a fallback if this theme is deactivated.
 $html = new WP_HTML_Tag_Processor( $content );
 if ( ! $html->next_tag( 'SECTION' ) ) { return $content; }
 $classes = $html->get_attribute( 'class' ) ?: 'section section--hero';
 $resolved = vaedor_base_apply_section_defaults( array( 'blockName' => 'core/group', 'attrs' => array( 'className' => $classes ) ) );
 foreach ( explode( ' ', $resolved['attrs']['className'] ) as $class ) { $html->add_class( $class ); }
 return $html->get_updated_html();
}
