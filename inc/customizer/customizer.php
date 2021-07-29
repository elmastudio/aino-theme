<?php
/**
 * Aino Theme Customizer
 *
 * @package Aino
 */

/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aino_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Add Theme Panels
	 */
	$wp_customize->add_panel(
		'aino_themeoptions',
		array(
			'priority'       => 1,
			'theme_supports' => '',
			'title'          => esc_html__( 'Theme Options', 'aino' ),
		)
	);

	/**
	 * Add Theme Sections
	 */
	$wp_customize->add_section(
		'aino_typography',
		array(
			'title'    => esc_html__( 'Typography', 'aino' ),
			'priority' => 1,
			'panel'    => 'aino_themeoptions',
		)
	);

	$wp_customize->add_section(
		'aino_styles',
		array(
			'title'    => esc_html__( 'Styles', 'aino' ),
			'priority' => 2,
			'panel'    => 'aino_themeoptions',
		)
	);

	/**
	 * Theme Options - Typography
	 */
	// Theme Options - Typography - Disable Google Fonts.
	$wp_customize->add_setting(
		'disable_googlefonts',
		array(
			'default'           => aino_defaults( 'disable_googlefonts' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'disable_googlefonts',
		array(
			'label'    => esc_html__( 'Disable Google fonts in theme', 'aino' ),
			'section'  => 'aino_typography',
			'type'     => 'checkbox',
			'priority' => 1,
		)
	);

	/**
	 * Theme Options - Styles
	 */

	// Theme Options - Styles - Button Style.
	$wp_customize->add_setting(
		'button_style',
		array(
			'default'           => aino_defaults( 'button_style' ),
			'sanitize_callback' => 'aino_sanitize_shapes',
		)
	);

	$wp_customize->add_control(
		'button_style',
		array(
			'label'       => esc_html__( 'Button Border Radius', 'aino' ),
			'description' => esc_html__( 'Choose the degree of curvature.', 'aino' ),
			'section'     => 'aino_styles',
			'priority'    => 1,
			'type'        => 'select',
			'choices'     => array(
				'squared' => esc_html__( 'square', 'aino' ),
				'curved'  => esc_html__( 'curved', 'aino' ),
				'round'   => esc_html__( 'round', 'aino' ),
			),
		)
	);

	// Theme Options - Styles - Form Style.
	$wp_customize->add_setting(
		'form_style',
		array(
			'default'           => aino_defaults( 'form_style' ),
			'sanitize_callback' => 'aino_sanitize_shapes',
		)
	);

	$wp_customize->add_control(
		'form_style',
		array(
			'label'       => esc_html__( 'Form Border Radius', 'aino' ),
			'description' => esc_html__( 'Choose the degree of curvature.', 'aino' ),
			'section'     => 'aino_styles',
			'priority'    => 4,
			'type'        => 'select',
			'choices'     => array(
				'squared' => esc_html__( 'square', 'aino' ),
				'curved'  => esc_html__( 'curved', 'aino' ),
				'round'   => esc_html__( 'round', 'aino' ),
			),
		)
	);

}
add_action( 'customize_register', 'aino_customize_register' );
