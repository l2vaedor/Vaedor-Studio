<?php
/**
 * Section configuration, defaults and frontend class application.
 *
 * @package Vaedor_Base
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function vaedor_base_choice( $label, $values, $default = 'inherit' ) {
	return array( 'label' => $label, 'type' => 'select', 'default' => $default, 'choices' => $values );
}

/** Declarative section schema shared by Customizer, rendering and validation. */
function vaedor_base_section_settings_schema() {
	$inherit = array( 'inherit' => __( 'Използвай General', 'vaedor-theme' ) );
	$background = array( 'default' => __( 'Default', 'vaedor-theme' ), 'surface' => __( 'Surface', 'vaedor-theme' ), 'contrast' => __( 'Contrast', 'vaedor-theme' ) );
	$spacing = array( 'compact' => __( 'Compact', 'vaedor-theme' ), 'default' => __( 'Default', 'vaedor-theme' ), 'spacious' => __( 'Spacious', 'vaedor-theme' ) );
	$alignment = array( 'left' => __( 'Left', 'vaedor-theme' ), 'center' => __( 'Center', 'vaedor-theme' ), 'right' => __( 'Right', 'vaedor-theme' ) );
	$ratio = array( '50-50' => '50/50', '40-60' => '40/60', '60-40' => '60/40' );
	$media_ratio = array( 'natural' => __( 'Natural', 'vaedor-theme' ), 'landscape' => __( 'Landscape', 'vaedor-theme' ), 'portrait' => __( 'Portrait', 'vaedor-theme' ), 'square' => __( 'Square', 'vaedor-theme' ), 'cover' => __( 'Cover', 'vaedor-theme' ) );
	$enabled = array( 'label' => __( 'Enable section pattern', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true );
	return array(
		'general' => array(
			'label' => __( 'General', 'vaedor-theme' ),
			'description' => __( 'Fallback presentation defaults used when a section setting is set to “Use General”.', 'vaedor-theme' ),
			'fields' => array(
				'spacing' => vaedor_base_choice( __( 'Default section spacing', 'vaedor-theme' ), $spacing, 'default' ),
				'background' => vaedor_base_choice( __( 'Default section background', 'vaedor-theme' ), $background, 'default' ),
				'width' => vaedor_base_choice( __( 'Default section width', 'vaedor-theme' ), array( 'normal' => __( 'Normal', 'vaedor-theme' ), 'wide' => __( 'Wide', 'vaedor-theme' ) ), 'normal' ),
				'alignment' => vaedor_base_choice( __( 'Default content alignment', 'vaedor-theme' ), array( 'left' => __( 'Left', 'vaedor-theme' ), 'center' => __( 'Center', 'vaedor-theme' ) ), 'left' ),
			),
		),
		'hero' => array(
			'label' => __( 'Hero', 'vaedor-theme' ),
			'description' => __( 'Defaults for the Hero pattern. Content remains editable in Gutenberg.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'layout' => vaedor_base_choice( __( 'Default layout', 'vaedor-theme' ), array( 'content-only' => __( 'Content only', 'vaedor-theme' ), 'centered' => __( 'Centered', 'vaedor-theme' ), 'split' => __( 'Split', 'vaedor-theme' ), 'media-left' => __( 'Media left', 'vaedor-theme' ), 'media-right' => __( 'Media right', 'vaedor-theme' ) ), 'split' ),
				'ratio' => vaedor_base_choice( __( 'Default split ratio', 'vaedor-theme' ), $ratio, '50-50' ),
				'alignment' => vaedor_base_choice( __( 'Default alignment', 'vaedor-theme' ), $inherit + $alignment ),
				'size' => vaedor_base_choice( __( 'Default size', 'vaedor-theme' ), array( 'compact' => __( 'Compact', 'vaedor-theme' ), 'default' => __( 'Default', 'vaedor-theme' ), 'large' => __( 'Large', 'vaedor-theme' ) ), 'default' ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
				'media_ratio' => vaedor_base_choice( __( 'Default media ratio', 'vaedor-theme' ), $media_ratio, 'landscape' ),
			),
		),
		'content' => array(
			'label' => __( 'Content', 'vaedor-theme' ), 'description' => __( 'Defaults for rich Gutenberg content sections.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'layout' => vaedor_base_choice( __( 'Default layout', 'vaedor-theme' ), array( 'single' => __( 'Single', 'vaedor-theme' ), 'narrow' => __( 'Narrow', 'vaedor-theme' ), 'two-columns' => __( 'Two columns', 'vaedor-theme' ), 'centered' => __( 'Centered', 'vaedor-theme' ) ), 'single' ),
				'alignment' => vaedor_base_choice( __( 'Default alignment', 'vaedor-theme' ), $inherit + $alignment ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
			),
		),
		'cards' => array(
			'label' => __( 'Cards', 'vaedor-theme' ), 'description' => __( 'CSS Grid card defaults; no carousel, filtering or AJAX.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'columns' => vaedor_base_choice( __( 'Default columns', 'vaedor-theme' ), array( '2' => '2', '3' => '3', '4' => '4', 'auto' => __( 'Auto-fit', 'vaedor-theme' ) ), '3' ),
				'card_style' => vaedor_base_choice( __( 'Default card style', 'vaedor-theme' ), array( 'default' => __( 'Default', 'vaedor-theme' ), 'bordered' => __( 'Bordered', 'vaedor-theme' ), 'surface' => __( 'Surface', 'vaedor-theme' ) ), 'bordered' ),
				'layout' => vaedor_base_choice( __( 'Default card layout', 'vaedor-theme' ), array( 'vertical' => __( 'Vertical', 'vaedor-theme' ), 'horizontal' => __( 'Horizontal', 'vaedor-theme' ) ), 'vertical' ),
				'image' => vaedor_base_choice( __( 'Default image', 'vaedor-theme' ), array( 'show' => __( 'Show', 'vaedor-theme' ), 'hide' => __( 'Hide', 'vaedor-theme' ) ), 'show' ),
				'alignment' => vaedor_base_choice( __( 'Default alignment', 'vaedor-theme' ), $inherit + array( 'left' => __( 'Left', 'vaedor-theme' ), 'center' => __( 'Center', 'vaedor-theme' ) ) ),
				'equal_height' => array( 'label' => __( 'Equal-height cards', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
			),
		),
		'media' => array(
			'label' => __( 'Media', 'vaedor-theme' ), 'description' => __( 'Content and one image; galleries belong to project components.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'position' => vaedor_base_choice( __( 'Default media position', 'vaedor-theme' ), array( 'left' => __( 'Left', 'vaedor-theme' ), 'right' => __( 'Right', 'vaedor-theme' ) ), 'right' ),
				'ratio' => vaedor_base_choice( __( 'Default layout ratio', 'vaedor-theme' ), $ratio, '50-50' ),
				'vertical' => vaedor_base_choice( __( 'Default vertical alignment', 'vaedor-theme' ), array( 'start' => __( 'Start', 'vaedor-theme' ), 'center' => __( 'Center', 'vaedor-theme' ), 'end' => __( 'End', 'vaedor-theme' ) ), 'center' ),
				'media_ratio' => vaedor_base_choice( __( 'Default media ratio', 'vaedor-theme' ), $media_ratio, 'landscape' ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
			),
		),
		'cta' => array(
			'label' => __( 'CTA', 'vaedor-theme' ), 'description' => __( 'Presentation defaults only; no popups, tracking or integrations.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'layout' => vaedor_base_choice( __( 'Default layout', 'vaedor-theme' ), array( 'centered' => __( 'Centered', 'vaedor-theme' ), 'inline' => __( 'Inline', 'vaedor-theme' ), 'split' => __( 'Split', 'vaedor-theme' ) ), 'centered' ),
				'alignment' => vaedor_base_choice( __( 'Default alignment', 'vaedor-theme' ), $inherit + array( 'left' => __( 'Left', 'vaedor-theme' ), 'center' => __( 'Center', 'vaedor-theme' ) ) ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background, 'surface' ),
				'size' => vaedor_base_choice( __( 'Default size', 'vaedor-theme' ), array( 'compact' => __( 'Compact', 'vaedor-theme' ), 'default' => __( 'Default', 'vaedor-theme' ), 'large' => __( 'Large', 'vaedor-theme' ) ), 'default' ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
			),
		),
		'faq' => array(
			'label' => __( 'FAQ', 'vaedor-theme' ), 'description' => __( 'Uses native Details blocks; no accordion JavaScript.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'columns' => vaedor_base_choice( __( 'Default columns', 'vaedor-theme' ), array( '1' => '1', '2' => '2' ), '1' ),
				'style' => vaedor_base_choice( __( 'Default style', 'vaedor-theme' ), array( 'default' => __( 'Default', 'vaedor-theme' ), 'bordered' => __( 'Bordered', 'vaedor-theme' ), 'separated' => __( 'Separated', 'vaedor-theme' ) ), 'default' ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
				'open_first' => array( 'label' => __( 'Open first item by default', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => false ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
			),
		),
		'contact' => array(
			'label' => __( 'Contact', 'vaedor-theme' ), 'description' => __( 'Controls presentation only. Contact data and form blocks remain page content.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'layout' => vaedor_base_choice( __( 'Default layout', 'vaedor-theme' ), array( 'details-form' => __( 'Details + form', 'vaedor-theme' ), 'form-details' => __( 'Form + details', 'vaedor-theme' ), 'centered' => __( 'Centered', 'vaedor-theme' ), 'details-grid' => __( 'Details grid', 'vaedor-theme' ) ), 'details-form' ),
				'ratio' => vaedor_base_choice( __( 'Default ratio', 'vaedor-theme' ), $ratio, '50-50' ),
				'show_address' => array( 'label' => __( 'Show address by default', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_phone' => array( 'label' => __( 'Show phone by default', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_email' => array( 'label' => __( 'Show email by default', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_hours' => array( 'label' => __( 'Show working hours by default', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_social' => array( 'label' => __( 'Show social area by default', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
			),
		),
		'posts' => array(
			'label' => __( 'Posts', 'vaedor-theme' ), 'description' => __( 'Query Loop defaults; filtering remains instance content.', 'vaedor-theme' ),
			'fields' => array(
				'enabled' => $enabled,
				'number' => array( 'label' => __( 'Default number of posts', 'vaedor-theme' ), 'type' => 'number', 'default' => 6, 'min' => 1, 'max' => 24 ),
				'layout' => vaedor_base_choice( __( 'Default layout', 'vaedor-theme' ), array( 'list' => __( 'List', 'vaedor-theme' ), '2' => __( '2 columns', 'vaedor-theme' ), '3' => __( '3 columns', 'vaedor-theme' ), '4' => __( '4 columns', 'vaedor-theme' ) ), '3' ),
				'show_image' => array( 'label' => __( 'Show featured image', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_date' => array( 'label' => __( 'Show date', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_author' => array( 'label' => __( 'Show author', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => false ),
				'show_categories' => array( 'label' => __( 'Show categories', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => false ),
				'show_excerpt' => array( 'label' => __( 'Show excerpt', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'show_read_more' => array( 'label' => __( 'Show read more', 'vaedor-theme' ), 'type' => 'checkbox', 'default' => true ),
				'order' => vaedor_base_choice( __( 'Default order', 'vaedor-theme' ), array( 'newest' => __( 'Newest', 'vaedor-theme' ), 'oldest' => __( 'Oldest', 'vaedor-theme' ) ), 'newest' ),
				'background' => vaedor_base_choice( __( 'Default background', 'vaedor-theme' ), $inherit + $background ),
				'spacing' => vaedor_base_choice( __( 'Default spacing', 'vaedor-theme' ), $inherit + $spacing ),
			),
		),
	);
}

function vaedor_base_settings_defaults( $tab ) {
	$defaults = array();
	foreach ( vaedor_base_effective_fields( $tab ) as $key => $field ) {
		$defaults[ $key ] = $field['default'];
	}
	return $defaults;
}

function vaedor_base_get_settings( $tab ) {
	$defaults = vaedor_base_settings_defaults( $tab );
	$saved = get_option( vaedor_base_option_name( $tab ), array() );
	$saved = is_array( $saved ) ? $saved : array();
	if ( 'colors' === $tab ) {
		// Preserve existing brand colors until the simplified palette is first saved.
		$legacy = array( 'text-color' => 'text', 'secondary-text-color' => 'muted', 'accent-color' => 'primary', 'secondary-accent-color' => 'secondary', 'background-color' => 'background', 'secondary-background-color' => 'surface', 'text-color-contrast' => 'contrast_text', 'accent-color-contrast' => 'contrast_link', 'secondary-accent-color-contrast' => 'contrast_link_hover', 'background-color-contrast' => 'contrast_background' );
		foreach ( $defaults as $key => $fallback ) {
			$saved[$key] = sanitize_hex_color( $saved[$key] ?? $saved[$legacy[$key] ?? ''] ?? '' ) ?: $fallback;
		}
	}
	if ( 'typography' === $tab && isset($saved['base_letter_spacing']) && !isset($saved['h1_line_height']) ) { $saved['base_letter_spacing'] = (float)$saved['base_letter_spacing'] * 16; }
 if ( 'buttons' === $tab ) {
  foreach(array('top'=>'padding_y','bottom'=>'padding_y','left'=>'padding_x','right'=>'padding_x') as $side=>$old){ if(!isset($saved['padding_'.$side]) && isset($saved[$old])){$saved['padding_'.$side]=$saved[$old];} }
 }
 return vaedor_base_validate_values(vaedor_base_effective_fields($tab),wp_parse_args($saved,$defaults));
}

function vaedor_base_get_section_settings( $section ) {
	return vaedor_base_get_settings( 'cards' === $section ? 'section-cards' : $section );
}

function vaedor_base_resolved_setting( $section, $key ) {
	$section_settings = vaedor_base_get_section_settings( $section );
	$value = $section_settings[ $key ] ?? 'inherit';
	if ( 'inherit' === $value ) {
		$value = vaedor_base_get_settings( 'general' )[ $key ] ?? 'default';
	}
	return $value;
}

/** Add mapped defaults only when the instance has no explicit modifier for that dimension. */
function vaedor_base_apply_section_defaults( $parsed_block ) {
	$class_name = $parsed_block['attrs']['className'] ?? '';
	if ( 'core/group' !== ( $parsed_block['blockName'] ?? '' ) || ! preg_match( '/(?:^|\s)section--(hero|content|cards|media|cta|faq|contact|posts)(?:\s|$)/', $class_name, $match ) ) {
		return $parsed_block;
	}
	$type = $match[1];
	$classes = preg_split( '/\s+/', trim( $class_name ) );
	$maps = array(
		'alignment' => array( 'prefix' => 'section--align-', 'value' => vaedor_base_resolved_setting( $type, 'alignment' ) ),
		'background' => array( 'prefix' => 'section--', 'candidates' => array( 'section--surface', 'section--contrast', 'section--background-default' ), 'value' => vaedor_base_resolved_setting( $type, 'background' ), 'map' => array( 'surface' => 'section--surface', 'contrast' => 'section--contrast', 'default' => '' ) ),
		'spacing' => array( 'prefix' => 'section--', 'candidates' => array( 'section--compact', 'section--spacious', 'section--spacing-default' ), 'value' => vaedor_base_resolved_setting( $type, 'spacing' ), 'map' => array( 'compact' => 'section--compact', 'spacious' => 'section--spacious', 'default' => '' ) ),
		'width' => array( 'prefix' => 'section--', 'candidates' => array( 'section--narrow', 'section--wide', 'section--full', 'section--width-normal' ), 'value' => vaedor_base_resolved_setting( $type, 'width' ), 'map' => array( 'narrow' => 'section--narrow', 'wide' => 'section--wide', 'full' => 'section--full', 'normal' => '' ) ),
	);
	$specific = vaedor_base_specific_modifier_maps( $type );
	foreach ( array_merge( $maps, $specific ) as $rule ) {
		$candidates = $rule['candidates'] ?? array_filter( array_map( function ( $value ) use ( $rule ) { return $rule['prefix'] . $value; }, array_keys( $rule['map'] ?? array() ) ) );
		$has_explicit = (bool) array_intersect( $classes, $candidates );
		if ( empty( $candidates ) ) {
			foreach ( $classes as $existing_class ) {
				if ( str_starts_with( $existing_class, $rule['prefix'] ) ) {
					$has_explicit = true;
					break;
				}
			}
		}
		if ( $has_explicit ) {
			continue;
		}
		$class = $rule['map'][ $rule['value'] ] ?? ( $rule['prefix'] . $rule['value'] );
		if ( $class && ! str_ends_with( $class, 'inherit' ) ) {
			$classes[] = $class;
		}
	}
	$parsed_block['attrs']['className'] = implode( ' ', array_unique( $classes ) );
	return $parsed_block;
}
add_filter( 'render_block_data', 'vaedor_base_apply_section_defaults' );

/** Ensure resolved attributes are reflected in the saved block's opening tag. */
function vaedor_base_render_section_classes( $block_content, $block ) {
	$class_name = $block['attrs']['className'] ?? '';
	if ( 'core/group' !== ( $block['blockName'] ?? '' ) || ! preg_match( '/(?:^|\s)section--(?:hero|content|cards|media|cta|faq|contact|posts)(?:\s|$)/', $class_name ) ) {
		return $block_content;
	}
	$resolved = vaedor_base_apply_section_defaults( $block );
	$class_name = $resolved['attrs']['className'];
	$processor = new WP_HTML_Tag_Processor( $block_content );
	if ( ! $processor->next_tag() ) {
		return $block_content;
	}
	foreach ( preg_split( '/\s+/', trim( $class_name ) ) as $class ) {
		if ( $class ) {
			$processor->add_class( $class );
		}
	}
	return $processor->get_updated_html();
}
add_filter( 'render_block', 'vaedor_base_render_section_classes', 8, 2 );

/** Return the same resolved classes for small PHP template integrations. */
function vaedor_base_section_classes( $type, $extra = array() ) {
	$block = vaedor_base_apply_section_defaults(
		array(
			'blockName' => 'core/group',
			'attrs' => array( 'className' => implode( ' ', array_merge( array( 'section', 'section--' . $type ), $extra ) ) ),
		)
	);
	return $block['attrs']['className'];
}

function vaedor_base_specific_modifier_maps( $type ) {
	$settings = vaedor_base_get_section_settings( $type );
	$rules = array();
	$add = function ( $key, $prefix, $values = array() ) use ( &$rules, $settings ) {
		if ( isset( $settings[ $key ] ) ) {
			$rules[] = array( 'prefix' => $prefix, 'value' => (string) $settings[ $key ], 'map' => $values );
		}
	};
	if ( 'hero' === $type ) { $add( 'layout', 'section--hero-layout-' ); $add( 'ratio', 'section--ratio-' ); $add( 'size', 'section--hero-size-' ); $add( 'media_ratio', 'section--media-ratio-' ); }
	if ( 'content' === $type ) { $add( 'layout', 'section--content-layout-' ); }
	if ( 'cards' === $type ) { $add( 'columns', 'section--cards-columns-' ); $add( 'card_style', 'section--cards-style-' ); $add( 'layout', 'section--cards-layout-' ); $add( 'image', 'section--cards-image-' ); if ( ! empty( $settings['equal_height'] ) ) { $rules[] = array( 'prefix' => 'section--cards-', 'value' => 'equal-height', 'map' => array() ); } }
	if ( 'media' === $type ) { $add( 'position', 'section--media-position-' ); $add( 'ratio', 'section--ratio-' ); $add( 'vertical', 'section--vertical-' ); $add( 'media_ratio', 'section--media-ratio-' ); }
	if ( 'cta' === $type ) { $add( 'layout', 'section--cta-layout-' ); $add( 'size', 'section--cta-size-' ); }
	if ( 'faq' === $type ) { $add( 'columns', 'section--faq-columns-' ); $add( 'style', 'section--faq-style-' ); }
	if ( 'contact' === $type ) {
		$add( 'layout', 'section--contact-layout-' ); $add( 'ratio', 'section--ratio-' );
		foreach ( array( 'address', 'phone', 'email', 'hours', 'social' ) as $detail ) { if ( empty( $settings[ 'show_' . $detail ] ) ) { $rules[] = array( 'prefix' => 'section--contact-', 'value' => 'hide-' . $detail, 'map' => array() ); } }
	}
	if ( 'posts' === $type ) {
		$add( 'layout', 'section--posts-layout-' );
		foreach ( array( 'image', 'date', 'author', 'categories', 'excerpt', 'read_more' ) as $detail ) { if ( empty( $settings[ 'show_' . $detail ] ) ) { $rules[] = array( 'prefix' => 'section--posts-', 'value' => 'hide-' . str_replace( '_', '-', $detail ), 'map' => array() ); } }
	}
	return $rules;
}

/** Open the first native Details element inside FAQ without frontend JavaScript. */
function vaedor_base_faq_open_first( $block_content, $block ) {
	if ( 'core/group' !== ( $block['blockName'] ?? '' ) || ! str_contains( $block['attrs']['className'] ?? '', 'section--faq' ) || empty( vaedor_base_get_section_settings( 'faq' )['open_first'] ) ) {
		return $block_content;
	}
	$processor = new WP_HTML_Tag_Processor( $block_content );
	if ( $processor->next_tag( 'DETAILS' ) ) {
		$processor->set_attribute( 'open', '' );
		return $processor->get_updated_html();
	}
	return $block_content;
}
add_filter( 'render_block', 'vaedor_base_faq_open_first', 10, 2 );

/** Disabled types disappear from normal pattern insertion but existing page content remains renderable. */
function vaedor_base_hide_disabled_patterns() {
	$registry = WP_Block_Patterns_Registry::get_instance();
	foreach ( array( 'hero', 'content', 'cards', 'media', 'cta', 'faq', 'contact', 'posts' ) as $type ) {
		$pattern_name = 'vaedor-theme/' . $type;
		if ( empty( vaedor_base_get_section_settings( $type )['enabled'] ) && $registry->is_registered( $pattern_name ) ) {
			unregister_block_pattern( $pattern_name );
		}
	}
}
add_action( 'init', 'vaedor_base_hide_disabled_patterns', 20 );

add_action('enqueue_block_editor_assets',function(){
 wp_enqueue_script('vaedor-section-editor',get_theme_file_uri('/assets/js/section-editor.js'),array('wp-hooks','wp-element','wp-block-editor','wp-components'),vaedor_asset_version('/assets/js/section-editor.js'),true);
 $defaults=array();foreach(array('hero','content','cards','media','faq','cta') as $type){$defaults[$type]=vaedor_base_section_classes($type);}
 wp_add_inline_script('vaedor-section-editor','window.vaedorSectionDefaults='.wp_json_encode($defaults).';','before');
});
