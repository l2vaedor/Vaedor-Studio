<?php
/**
 * Minimal Customizer: brand colors and header/footer contact details.
 *
 * Logo is handled by core (Site Identity). Every other design value lives in
 * theme.json. Values are stored as theme mods; empty means "use theme.json".
 *
 * @package Vaedor_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Brand colors exposed in the Customizer, keyed by theme.json palette slug.
 *
 * @return array<string, string>
 */
function vaedor_customizer_colors() {
	return array(
		'accent-color'     => __( 'Accent', 'vaedor-theme' ),
		'text-color'       => __( 'Text', 'vaedor-theme' ),
		'heading-color'    => __( 'Headings', 'vaedor-theme' ),
		'background-color' => __( 'Background', 'vaedor-theme' ),
	);
}

/**
 * Header and footer text fields.
 *
 * @return array<string, array{label: string, type: string, section: string}>
 */
function vaedor_customizer_fields() {
	return array(
		'header_cta_text'    => array( 'label' => __( 'Header button text', 'vaedor-theme' ), 'type' => 'text', 'section' => 'vaedor_header' ),
		'header_cta_url'     => array( 'label' => __( 'Header button URL', 'vaedor-theme' ), 'type' => 'url', 'section' => 'vaedor_header' ),
		'footer_description' => array( 'label' => __( 'Footer description', 'vaedor-theme' ), 'type' => 'textarea', 'section' => 'vaedor_footer' ),
		'footer_phone'       => array( 'label' => __( 'Phone', 'vaedor-theme' ), 'type' => 'tel', 'section' => 'vaedor_footer' ),
		'footer_email'       => array( 'label' => __( 'Email', 'vaedor-theme' ), 'type' => 'email', 'section' => 'vaedor_footer' ),
		'footer_copyright'   => array( 'label' => __( 'Copyright ({year} and {site} are replaced)', 'vaedor-theme' ), 'type' => 'text', 'section' => 'vaedor_footer' ),
	);
}

/**
 * Register Customizer sections and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 * @return void
 */
function vaedor_customize_register( $wp_customize ) {
	foreach ( vaedor_customizer_colors() as $slug => $label ) {
		$id = 'vaedor_color_' . $slug;
		$wp_customize->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array( 'label' => $label, 'section' => 'colors' ) ) );
	}

	$wp_customize->add_section( 'vaedor_header', array( 'title' => __( 'Header', 'vaedor-theme' ), 'priority' => 40 ) );
	$wp_customize->add_section( 'vaedor_footer', array( 'title' => __( 'Footer', 'vaedor-theme' ), 'priority' => 41 ) );

	$sanitizers = array(
		'text'     => 'sanitize_text_field',
		'textarea' => 'sanitize_textarea_field',
		'url'      => 'esc_url_raw',
		'email'    => 'sanitize_email',
		'tel'      => 'sanitize_text_field',
	);
	foreach ( vaedor_customizer_fields() as $key => $field ) {
		$id = 'vaedor_' . $key;
		$wp_customize->add_setting( $id, array( 'default' => '', 'sanitize_callback' => $sanitizers[ $field['type'] ] ) );
		$wp_customize->add_control( $id, array( 'label' => $field['label'], 'section' => $field['section'], 'type' => $field['type'] ) );
	}
}
add_action( 'customize_register', 'vaedor_customize_register' );

/**
 * Read a header/footer field.
 *
 * @param string $key Field key without prefix.
 * @return string
 */
function vaedor_option( $key ) {
	return (string) get_theme_mod( 'vaedor_' . $key, '' );
}

/**
 * Apply Customizer colors to the theme.json palette, so the frontend, the
 * editor and the has-*-color classes all use the same value.
 *
 * @param WP_Theme_JSON_Data $theme_json Theme data.
 * @return WP_Theme_JSON_Data
 */
function vaedor_customizer_palette( $theme_json ) {
	$data    = $theme_json->get_data();
	$palette = $data['settings']['color']['palette'] ?? array();
	// Processed data is keyed by origin; raw theme.json data is a plain list.
	$palette = $palette['theme'] ?? $palette;
	$changed = false;

	foreach ( $palette as $index => $color ) {
		$custom = sanitize_hex_color( (string) get_theme_mod( 'vaedor_color_' . $color['slug'], '' ) );
		if ( $custom ) {
			$palette[ $index ]['color'] = $custom;
			$changed                    = true;
		}
	}

	if ( ! $changed ) {
		return $theme_json;
	}

	return $theme_json->update_with(
		array(
			'version'  => 3,
			'settings' => array( 'color' => array( 'palette' => $palette ) ),
		)
	);
}
add_filter( 'wp_theme_json_data_theme', 'vaedor_customizer_palette' );
add_action( 'customize_save_after', 'wp_clean_theme_json_cache' );
