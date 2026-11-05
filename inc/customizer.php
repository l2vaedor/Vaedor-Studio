<?php
/**
 * Vaedor Base controls in the native WordPress Customizer.
 *
 * Settings point at the existing option arrays. No values are migrated or
 * written until the user publishes a Customizer changeset.
 *
 * @package Vaedor_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Define controls only after WordPress has loaded the Customizer base class. */
function vaedor_base_customize_control_classes() {
	if ( class_exists( 'Vaedor_Base_Customize_Range_Control' ) ) {
		return;
	}
	/** Range and number inputs bound to the same Customizer setting. */
	class Vaedor_Base_Customize_Range_Control extends WP_Customize_Control {
	public $type = 'vaedor-range-number';

	public function render_content() {
		$input_id = '_customize-input-' . $this->id;
		?>
		<label class="vaedor-customize-range">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( $this->description ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
			<span class="vaedor-customize-range__inputs">
				<input type="range" aria-label="<?php echo esc_attr( $this->label ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?>>
				<input id="<?php echo esc_attr( $input_id ); ?>" type="number" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?>>
				<?php if ( isset( $this->input_attrs['data-unit'] ) && '' !== $this->input_attrs['data-unit'] ) : ?>
					<span aria-hidden="true"><?php echo esc_html( $this->input_attrs['data-unit'] ); ?></span>
				<?php endif; ?>
			</span>
		</label>
		<?php
	}
	}

/** A scoped reset action; JavaScript changes values but never publishes them. */
	class Vaedor_Base_Customize_Reset_Control extends WP_Customize_Control {
	public $type = 'vaedor-reset';
	public $reset_values = array();

	public function render_content() {
		?>
		<button type="button" class="button vaedor-customize-reset" data-vaedor-reset="<?php echo esc_attr( wp_json_encode( $this->reset_values ) ); ?>">
			<?php esc_html_e( 'Върни началните стойности', 'vaedor-theme' ); ?>
		</button>
		<p class="description"><?php esc_html_e( 'Промяната остава непубликувана до натискане на „Публикуване“.', 'vaedor-theme' ); ?></p>
		<?php
	}
	}
}

function vaedor_base_customizer_sections() {
	return array(
		'colors'        => array( 'title' => __( 'Цветове', 'vaedor-theme' ), 'tabs' => array( 'colors' ) ),
		'layout'        => array( 'title' => __( 'Layout и отстояния', 'vaedor-theme' ), 'tabs' => array( 'general', 'layout', 'gutenberg' ) ),
		'body-type'     => array( 'title' => __( 'Основен текст', 'vaedor-theme' ), 'tabs' => array( 'typography' ), 'fields' => array( 'base_size', 'base_line_height', 'base_letter_spacing' ) ),
		'headings'      => array( 'title' => __( 'Заглавия H1–H6', 'vaedor-theme' ), 'tabs' => array( 'typography' ), 'fields' => array_values( array_filter( array_keys( vaedor_base_settings_schema()['typography']['fields'] ), function ( $key ) { return str_starts_with( $key, 'h' ); } ) ) ),
		'buttons'       => array( 'title' => __( 'Бутони', 'vaedor-theme' ), 'tabs' => array( 'buttons' ) ),
		'forms'         => array( 'title' => __( 'Форми', 'vaedor-theme' ), 'tabs' => array( 'forms' ) ),
		'cards'         => array( 'title' => __( 'Карти', 'vaedor-theme' ), 'tabs' => array( 'cards' ) ),
		'hero'          => array( 'title' => __( 'Секции — Hero', 'vaedor-theme' ), 'tabs' => array( 'hero' ), 'fields' => array( 'background', 'width', 'spacing' ) ),
		'content'       => array( 'title' => __( 'Секции — Content', 'vaedor-theme' ), 'tabs' => array( 'content' ), 'fields' => array( 'background', 'width', 'spacing' ) ),
		'section-cards' => array( 'title' => __( 'Секции — Cards', 'vaedor-theme' ), 'tabs' => array( 'section-cards' ), 'fields' => array( 'background', 'width', 'spacing' ) ),
		'media'         => array( 'title' => __( 'Секции — Media', 'vaedor-theme' ), 'tabs' => array( 'media' ), 'fields' => array( 'background', 'width', 'spacing' ) ),
		'faq'           => array( 'title' => __( 'Секции — FAQ', 'vaedor-theme' ), 'tabs' => array( 'faq' ), 'fields' => array( 'background', 'width', 'spacing' ) ),
		'cta'           => array( 'title' => __( 'Секции — CTA', 'vaedor-theme' ), 'tabs' => array( 'cta' ), 'fields' => array( 'background', 'width', 'spacing' ) ),
		'header'        => array( 'title' => __( 'Хедър', 'vaedor-theme' ), 'tabs' => array( 'header' ) ),
		'footer'        => array( 'title' => __( 'Футър', 'vaedor-theme' ), 'tabs' => array( 'footer' ) ),
	);
}

function vaedor_base_customize_sanitize_field( $value, $setting ) {
	if ( ! preg_match( '/^([^\[]+)\[([^\]]+)\]$/', $setting->id, $match ) ) {
		return null;
	}
	$option = $match[1];
	$key    = $match[2];
	$tab    = vaedor_base_customizer_tab_from_option( $option );
	$fields = vaedor_base_effective_fields( $tab );
	if ( ! isset( $fields[ $key ] ) ) {
		return null;
	}
	$clean = vaedor_base_validate_values( array( $key => $fields[ $key ] ), array( $key => $value ) );
	return $clean[ $key ];
}

function vaedor_base_customizer_tab_from_option( $option ) {
	if ( 'vaedor_base_cards_section' === $option ) {
		return 'section-cards';
	}
	return str_replace( 'vaedor_base_', '', $option );
}

function vaedor_base_customize_setting_id( $tab, $key ) {
	return vaedor_base_option_name( $tab ) . '[' . $key . ']';
}

function vaedor_base_customize_register( $wp_customize ) {
	vaedor_base_customize_control_classes();
	$wp_customize->add_panel( 'vaedor_base', array(
		'title'       => __( 'Vaedor Base', 'vaedor-theme' ),
		'description' => __( 'Глобални визуални настройки. Съдържанието и локалните варианти на секциите се редактират в Gutenberg.', 'vaedor-theme' ),
		'capability'  => 'edit_theme_options',
		'priority'    => 35,
	) );

	$schema   = vaedor_base_settings_schema();
	$priority = 10;
	foreach ( vaedor_base_customizer_sections() as $section_key => $section ) {
		$section_id = 'vaedor_base_' . $section_key;
		$wp_customize->add_section( $section_id, array(
			'title'      => $section['title'],
			'panel'      => 'vaedor_base',
			'capability' => 'edit_theme_options',
			'priority'   => $priority,
		) );
		$priority += 10;
		$reset = array();
		foreach ( $section['tabs'] as $tab ) {
			$allowed = $section['fields'] ?? array_keys( $schema[ $tab ]['fields'] );
			foreach ( $allowed as $key ) {
				if ( ! isset( $schema[ $tab ]['fields'][ $key ] ) ) {
					continue;
				}
				$field      = $schema[ $tab ]['fields'][ $key ];
				$setting_id = vaedor_base_customize_setting_id( $tab, $key );
				$wp_customize->add_setting( $setting_id, array(
					'type'              => 'option',
					'capability'        => 'edit_theme_options',
					'default'           => $field['default'],
					'transport'         => in_array( $tab, array( 'colors', 'layout', 'typography', 'buttons', 'forms', 'cards' ), true ) ? 'postMessage' : 'refresh',
					'sanitize_callback' => 'vaedor_base_customize_sanitize_field',
				) );
				vaedor_base_customize_add_control( $wp_customize, $section_id, $setting_id, $field );
				$reset[ $setting_id ] = $field['default'];
			}
		}
		$wp_customize->add_control( new Vaedor_Base_Customize_Reset_Control( $wp_customize, $section_id . '_reset', array(
			'section'  => $section_id,
			'priority' => 999,
			'settings'     => array(),
			'reset_values' => $reset,
		) ) );
	}
}
add_action( 'customize_register', 'vaedor_base_customize_register' );

function vaedor_base_customize_add_control( $wp_customize, $section_id, $setting_id, $field ) {
	$args = array(
		'label'       => $field['label'],
		'description' => $field['description'] ?? '',
		'section'     => $section_id,
		'settings'    => $setting_id,
	);
	if ( 'color' === $field['type'] ) {
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id, $args ) );
		return;
	}
	if ( 'number' === $field['type'] && ! empty( $field['range'] ) ) {
		$args['input_attrs'] = array( 'min' => $field['min'], 'max' => $field['max'], 'step' => $field['step'] ?? 1, 'data-unit' => $field['unit'] ?? '' );
		$wp_customize->add_control( new Vaedor_Base_Customize_Range_Control( $wp_customize, $setting_id, $args ) );
		return;
	}
	$args['type'] = $field['type'];
	if ( 'number' === $field['type'] ) {
		$args['input_attrs'] = array( 'min' => $field['min'], 'max' => $field['max'], 'step' => $field['step'] ?? 1 );
	}
	if ( 'select' === $field['type'] ) {
		$args['choices'] = $field['choices'];
	}
	$wp_customize->add_control( $setting_id, $args );
}

function vaedor_base_customize_controls_assets() {
	$css = '/assets/css/customizer-controls.css';
	$js  = '/assets/js/customizer-controls.js';
	wp_enqueue_style( 'vaedor-customizer-controls', get_theme_file_uri( $css ), array(), vaedor_asset_version( $css ) );
	wp_enqueue_script( 'vaedor-customizer-controls', get_theme_file_uri( $js ), array( 'customize-controls' ), vaedor_asset_version( $js ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'vaedor_base_customize_controls_assets' );

function vaedor_base_customize_preview_assets() {
	$js = '/assets/js/customizer-preview.js';
	wp_enqueue_script( 'vaedor-customizer-preview', get_theme_file_uri( $js ), array( 'customize-preview' ), vaedor_asset_version( $js ), true );
	wp_localize_script( 'vaedor-customizer-preview', 'vaedorCustomizerPreview', array( 'tokens' => vaedor_base_field_tokens() ) );
}
add_action( 'customize_preview_init', 'vaedor_base_customize_preview_assets' );
