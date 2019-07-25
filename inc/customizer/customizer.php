<?php
/**
 * Aino Theme Customizer
 *
 * @package Aino
 * @since Aino 0.0.1
 */

/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aino_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );

	/**
	 * Add Theme Panels
	 */
	$wp_customize->add_panel(
		'aino_themeoptions',
		array(
			'priority'       => 1,
			'theme_supports' => '',
			'title'          => esc_html__( 'Theme', 'aino' ),
		)
	);

	$wp_customize->add_panel(
		'aino_colors',
		array(
			'priority'       => 2,
			'theme_supports' => '',
			'title'          => esc_html__( 'Colors', 'aino' ),
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

	$wp_customize->add_section(
		'aino_header',
		array(
			'title'    => esc_html__( 'Header', 'aino' ),
			'priority' => 3,
			'panel'    => 'aino_themeoptions',
		)
	);

	$wp_customize->add_section(
		'aino_footer',
		array(
			'title'    => esc_html__( 'Footer', 'aino' ),
			'priority' => 4,
			'panel'    => 'aino_themeoptions',
		)
	);

	$wp_customize->add_section(
		'aino_blog',
		array(
			'title'    => esc_html__( 'Blog', 'aino' ),
			'priority' => 5,
			'panel'    => 'aino_themeoptions',
		)
	);

	$wp_customize->add_section(
		'aino_blogcards',
		array(
			'title'    => esc_html__( 'Blog Cards', 'aino' ),
			'priority' => 6,
			'panel'    => 'aino_themeoptions',
		)
	);

	/**
	 * Add Color Sections
	 */
	$wp_customize->add_section(
		'aino_general_colors',
		array(
			'title'    => esc_html__( 'General', 'aino' ),
			'priority' => 1,
			'panel'    => 'aino_colors',
		)
	);

	$wp_customize->add_section(
		'aino_footer_colors',
		array(
			'title'    => esc_html__( 'Footer', 'aino' ),
			'priority' => 2,
			'panel'    => 'aino_colors',
		)
	);

	$wp_customize->add_section(
		'aino_icon_colors',
		array(
			'title'    => esc_html__( 'Icons', 'aino' ),
			'priority' => 3,
			'panel'    => 'aino_colors',
		)
	);

	$wp_customize->add_section(
		'aino_blogcards_colors',
		array(
			'title'    => esc_html__( 'Blog Cards', 'aino' ),
			'priority' => 5,
			'panel'    => 'aino_colors',
		)
	);

	/**
	 * Theme Options - Site Identity
	 */

	// Theme Options - Site Identity - Hide Tagline.
	$wp_customize->add_setting(
		'sitedescription',
		array(
			'default'           => aino_defaults( 'sitedescription' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sitedescription',
		array(
			'label'    => esc_html__( 'Hide tagline', 'aino' ),
			'section'  => 'title_tagline',
			'type'     => 'checkbox',
			'priority' => 55,
		)
	);

	/**
	 * Theme Options - Typography
	 */
	// Theme Options - Typography - Headline Font Weight.
	$wp_customize->add_setting(
		'heading_fontweight',
		array(
			'default'           => aino_defaults( 'heading_fontweight' ),
			'sanitize_callback' => 'aino_sanitize_headline_font_weight',
		)
	);

	$wp_customize->add_control(
		'heading_fontweight',
		array(
			'label'    => esc_html__( 'Heading Font Weight', 'aino' ),
			'section'  => 'aino_typography',
			'priority' => 2,
			'type'     => 'select',
			'choices'  => array(
				'regular' => esc_html__( 'regular', 'aino' ),
				'bold'    => esc_html__( 'bold', 'aino' ),
			),
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
			'label'    => esc_html__( 'Button Style', 'aino' ),
			'section'  => 'aino_styles',
			'priority' => 1,
			'type'     => 'select',
			'choices'  => array(
				'squared' => esc_html__( 'squared', 'aino' ),
				'smooth'  => esc_html__( 'smooth', 'aino' ),
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
			'label'    => esc_html__( 'Form Style', 'aino' ),
			'section'  => 'aino_styles',
			'priority' => 2,
			'type'     => 'select',
			'choices'  => array(
				'squared' => esc_html__( 'squared', 'aino' ),
				'smooth'  => esc_html__( 'smooth', 'aino' ),
				'round'   => esc_html__( 'round', 'aino' ),
			),
		)
	);

	// Theme Options - Styles - Featured Images Style.
	$wp_customize->add_setting(
		'featuredimg_style',
		array(
			'default'           => aino_defaults( 'featuredimg_style' ),
			'sanitize_callback' => 'aino_sanitize_borderradius',
		)
	);

	$wp_customize->add_control(
		'featuredimg_style',
		array(
			'label'    => esc_html__( 'Featured Images Border Radius', 'aino' ),
			'section'  => 'aino_styles',
			'priority' => 3,
			'type'     => 'select',
			'choices'  => array(
				'radius-none' => esc_html__( 'none', 'aino' ),
				'radius-s'    => esc_html__( '12px', 'aino' ),
				'radius-m'    => esc_html__( '24px', 'aino' ),
				'radius-l'    => esc_html__( '36px', 'aino' ),
			),
		)
	);

	/**
	 * Theme Options - Header
	 */
	// Theme Options - Header - Hide Search in Header.
	$wp_customize->add_setting(
		'header_search',
		array(
			'default'           => aino_defaults( 'header_search' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_search',
		array(
			'label'    => esc_html__( 'Hide Search', 'aino' ),
			'section'  => 'aino_header',
			'type'     => 'checkbox',
			'priority' => 1,
		)
	);

	// Theme Options - Header - Hide Divider Borders.
	$wp_customize->add_setting(
		'header_dividers',
		array(
			'default'           => aino_defaults( 'header_dividers' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_dividers',
		array(
			'label'    => esc_html__( 'Hide Divider Borders', 'aino' ),
			'section'  => 'aino_header',
			'type'     => 'checkbox',
			'priority' => 2,
		)
	);

	// Theme Options - Header - Hide Bottom Border.
	$wp_customize->add_setting(
		'header_border',
		array(
			'default'           => aino_defaults( 'header_border' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_border',
		array(
			'label'    => esc_html__( 'Hide Bottom Border', 'aino' ),
			'section'  => 'aino_header',
			'type'     => 'checkbox',
			'priority' => 3,
		)
	);

	/**
	 * Theme Options - Footer
	 */
	// Theme Options - Footer - Footer Widget Alignment.
	$wp_customize->add_setting(
		'footerwidget_alignment',
		array(
			'default'           => aino_defaults( 'footerwidget_alignment' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'footerwidget_alignment',
		array(
			'label'    => esc_html__( 'Center Align Footer Widgets', 'aino' ),
			'section'  => 'aino_footer',
			'type'     => 'checkbox',
			'priority' => 1,
		)
	);

	// Theme Options - Footer - Footer Info Alignment.
	$wp_customize->add_setting(
		'footerinfo_alignment',
		array(
			'default'           => aino_defaults( 'footerinfo_alignment' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'footerinfo_alignment',
		array(
			'label'    => esc_html__( 'Center Align Footer Info', 'aino' ),
			'section'  => 'aino_footer',
			'type'     => 'checkbox',
			'priority' => 2,
		)
	);

	/**
	 * Theme Options - Blog
	 */
	// Theme Options - Blog - Blog Layout.
	$wp_customize->add_setting(
		'blog_columns',
		array(
			'default'           => aino_defaults( 'blog_columns' ),
			'sanitize_callback' => 'aino_sanitize_blog_columns',
		)
	);

	$wp_customize->add_control(
		'blog_columns',
		array(
			'label'    => esc_html__( 'Number of blog columns', 'aino' ),
			'section'  => 'aino_blog',
			'priority' => 1,
			'type'     => 'select',
			'choices'  => array(
				'onecolumn'   => esc_html__( '1 column', 'aino' ),
				'twocolumn'   => esc_html__( '2 column', 'aino' ),
				'threecolumn' => esc_html__( '3 column', 'aino' ),
			),
		)
	);

	/**
	 * Theme Options - Blog Cards
	 */
	// Theme Options - Blog Cards - Border Radius.
	$wp_customize->add_setting(
		'blogcards_borderradius',
		array(
			'default'           => aino_defaults( 'blogcards_borderradius' ),
			'sanitize_callback' => 'aino_sanitize_borderradius',
		)
	);

	$wp_customize->add_control(
		'blogcards_borderradius',
		array(
			'label'    => esc_html__( 'Border Radius', 'aino' ),
			'section'  => 'aino_blogcards',
			'priority' => 1,
			'type'     => 'select',
			'choices'  => array(
				'radius-none' => esc_html__( 'none', 'aino' ),
				'radius-s'    => esc_html__( '12px', 'aino' ),
				'radius-m'    => esc_html__( '24px', 'aino' ),
				'radius-l'    => esc_html__( '36px', 'aino' ),
			),
		)
	);

	// Theme Options - Blog Cards - Shadow default.
	$wp_customize->add_setting(
		'blogcards_shadow',
		array(
			'default'           => aino_defaults( 'blogcards_shadow' ),
			'sanitize_callback' => 'aino_sanitize_shadow',
		)
	);

	$wp_customize->add_control(
		'blogcards_shadow',
		array(
			'label'    => esc_html__( 'Shadow', 'aino' ),
			'section'  => 'aino_blogcards',
			'priority' => 2,
			'type'     => 'select',
			'choices'  => array(
				'shadow-none' => esc_html__( 'none', 'aino' ),
				'shadow-a'    => esc_html__( 'a', 'aino' ),
				'shadow-b'    => esc_html__( 'b', 'aino' ),
			),
		)
	);

	// Theme Options - Blog Cards - Shadow on Hover.
	$wp_customize->add_setting(
		'blogcards_shadow_hover',
		array(
			'default'           => aino_defaults( 'blogcards_shadow_hover' ),
			'sanitize_callback' => 'aino_sanitize_shadow',
		)
	);

	$wp_customize->add_control(
		'blogcards_shadow_hover',
		array(
			'label'    => esc_html__( 'Shadow on Hover', 'aino' ),
			'section'  => 'aino_blogcards',
			'priority' => 3,
			'type'     => 'select',
			'choices'  => array(
				'shadow-none' => esc_html__( 'none', 'aino' ),
				'shadow-a'    => esc_html__( 'a', 'aino' ),
				'shadow-b'    => esc_html__( 'b', 'aino' ),
			),
		)
	);

	// Theme Options - Blog Cards - Hover Effect.
	$wp_customize->add_setting(
		'blogcards_animation',
		array(
			'default'           => aino_defaults( 'cardhover_none' ),
			'sanitize_callback' => 'aino_sanitize_blogcards_animation',
		)
	);

	$wp_customize->add_control(
		'blogcards_animation',
		array(
			'label'    => esc_html__( 'Animation on Hover', 'aino' ),
			'section'  => 'aino_blogcards',
			'priority' => 4,
			'type'     => 'select',
			'choices'  => array(
				'cardhover_none'   => esc_html__( 'none', 'aino' ),
				'cardhover_zoom'   => esc_html__( 'move in', 'aino' ),
				'cardhover_moveup' => esc_html__( 'move up', 'aino' ),
			),
		)
	);

	// Theme Options - Blog Cards - Excerpt Text Length.
	$wp_customize->add_setting(
		'post_excerpt_lengths',
		array(
			'default'           => aino_defaults( 'post_excerpt_lengths' ),
			'sanitize_callback' => 'aino_sanitize_number_absint',
		)
	);

	$wp_customize->add_control(
		'post_excerpt_lengths',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'aino' ),
			'description' => esc_html__( 'Choose number of words.', 'aino' ),
			'section'     => 'aino_blogcards',
			'priority'    => 5,
			'type'        => 'number',
		)
	);

	// Theme Options - Blog - Post Details.
	$wp_customize->add_setting(
		'post_details',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'post_details',
		array(
			'label'    => esc_html__( 'Post Details', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'hidden',
			'priority' => 6,
		)
	);

	// Theme Options - Blog Cards - Display author instead of cats.
	$wp_customize->add_setting(
		'blogcards_authororcats',
		array(
			'default'           => aino_defaults( 'blogcards_authororcats' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'blogcards_authororcats',
		array(
			'label'    => esc_html__( 'Display author instead of categories', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 7,
		)
	);

	// Theme Options - Blog Cards - Display author avatar.
	$wp_customize->add_setting(
		'blogcards_authoravatar',
		array(
			'default'           => aino_defaults( 'blogcards_authoravatar' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'blogcards_authoravatar',
		array(
			'label'    => esc_html__( 'Display author avatar', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 8,
		)
	);

	// Theme Options - Blog - Display date.
	$wp_customize->add_setting(
		'post-publish-date',
		array(
			'default'           => aino_defaults( 'post-publish-date' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'post-publish-date',
		array(
			'label'    => esc_html__( 'Display publish date', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 9,
		)
	);

	// Theme Options - Blog - Display comments count.
	$wp_customize->add_setting(
		'display_comments',
		array(
			'default'           => aino_defaults( 'display_comments' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'display_comments',
		array(
			'label'    => esc_html__( 'Display comments count', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 10,
		)
	);

	/**
	 * Colors Panel
	 */
	// Colors - General - Main Background Color.
	$wp_customize->add_setting(
		'main_bg_color',
		array(
			'default'           => aino_defaults( 'main_bg_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_bg_color',
			array(
				'label'    => esc_html__( 'Main Background', 'aino' ),
				'section'  => 'aino_general_colors',
				'priority' => 1,
			)
		)
	);

	// Colors - General - Primary One.
	$wp_customize->add_setting(
		'primary_one_color',
		array(
			'default'           => aino_defaults( 'primary_one_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_one_color',
			array(
				'label'       => esc_html__( 'Primary One', 'aino' ),
				'description' => esc_html__( 'The primary link and button color.', 'aino' ),
				'section'     => 'aino_general_colors',
				'priority'    => 2,
			)
		)
	);

	// Colors - General - Primary Two.
	$wp_customize->add_setting(
		'primary_two_color',
		array(
			'default'           => aino_defaults( 'primary_two_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_two_color',
			array(
				'label'       => esc_html__( 'Primary Two', 'aino' ),
				'description' => esc_html__( 'The hover background color for primary buttons.', 'aino' ),
				'section'     => 'aino_general_colors',
				'priority'    => 3,
			)
		)
	);

	// Colors - General - Secondary One.
	$wp_customize->add_setting(
		'secondary_one_color',
		array(
			'default'           => aino_defaults( 'secondary_one_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_one_color',
			array(
				'label'       => esc_html__( 'Secondary', 'aino' ),
				'description' => esc_html__( 'The color to highlight special elements (e.g. badges).', 'aino' ),
				'section'     => 'aino_general_colors',
				'priority'    => 4,
			)
		)
	);

	// Colors - General - Comments Border.
	$wp_customize->add_setting(
		'comments_border_color',
		array(
			'default'           => aino_defaults( 'comments_border_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'comments_border_color',
			array(
				'label'    => esc_html__( 'Comments Border', 'aino' ),
				'section'  => 'aino_general_colors',
				'priority' => 5,
			)
		)
	);

	// Colors - General - Comments Background.
	$wp_customize->add_setting(
		'comments_bg_color',
		array(
			'default'           => aino_defaults( 'comments_bg_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'comments_bg_color',
			array(
				'label'    => esc_html__( 'Comments Background', 'aino' ),
				'section'  => 'aino_general_colors',
				'priority' => 6,
			)
		)
	);

	// Colors - Footer - Footer Background Color.
	$wp_customize->add_setting(
		'footer_bg_color',
		array(
			'default'           => aino_defaults( 'footer_bg_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_bg_color',
			array(
				'label'    => esc_html__( 'Footer Background', 'aino' ),
				'section'  => 'aino_footer_colors',
				'priority' => 7,
				'settings' => 'footer_bg_color',
			)
		)
	);

	// Colors - Icons - Icon default.
	$wp_customize->add_setting(
		'icon_color_one',
		array(
			'default'           => aino_defaults( 'icon_color_one' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'icon_color_one',
			array(
				'label'       => esc_html__( 'Icon One', 'aino' ),
				'description' => esc_html__( 'The default icon color.', 'aino' ),
				'section'     => 'aino_icon_colors',
				'priority'    => 1,
				'settings'    => 'icon_color_one',
			)
		)
	);

	// Colors - Icons - Icon hover.
	$wp_customize->add_setting(
		'icon_color_two',
		array(
			'default'           => aino_defaults( 'icon_color_two' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'icon_color_two',
			array(
				'label'       => esc_html__( 'Icon Two', 'aino' ),
				'description' => esc_html__( 'The icon hover color.', 'aino' ),
				'section'     => 'aino_icon_colors',
				'priority'    => 2,
				'settings'    => 'icon_color_two',
			)
		)
	);

		// Colors - Blog Cards - Background Color.
		$wp_customize->add_setting(
			'blogcards_bg_color',
			array(
				'default'           => aino_defaults( 'blogcards_bg_color' ),
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'blogcards_bg_color',
				array(
					'label'    => esc_html__( 'Background', 'aino' ),
					'section'  => 'aino_blogcards_colors',
					'priority' => 1,
					'settings' => 'blogcards_bg_color',
				)
			)
		);

		// Colors - Blog Cards - Background Hover Color.
		$wp_customize->add_setting(
			'blogcards_bg_color_hover',
			array(
				'default'           => aino_defaults( 'blogcards_bg_color_hover' ),
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'blogcards_bg_color_hover',
				array(
					'label'    => esc_html__( 'Background on Hover', 'aino' ),
					'section'  => 'aino_blogcards_colors',
					'priority' => 2,
					'settings' => 'blogcards_bg_color_hover',
				)
			)
		);

}
add_action( 'customize_register', 'aino_customize_register' );
