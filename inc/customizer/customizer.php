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

	$colors_section = $wp_customize->get_section( 'colors' );
		if ( is_object( $colors_section ) ) {
			$colors_section->title = __( 'Colors & Dark Mode', 'aino' );
		}

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

	$wp_customize->add_section(
		'aino_singlepost',
		array(
			'title'    => esc_html__( 'Single Post', 'aino' ),
			'priority' => 7,
			'panel'    => 'aino_themeoptions',
		)
	);

	/**
	 * Theme Options - Site Identity
	 */

	/* Hide Tagline ---------------- */
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
			'priority' => 10,
		)
	);

	/* 2X Header Logo ---------------- */
	$wp_customize->add_setting(
		'retina_logo',
		array(
			'default'           => aino_defaults( 'retina_logo' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'retina_logo',
		array(
			'type'        => 'checkbox',
			'section'     => 'title_tagline',
			'priority'    => 11,
			'label'       => __( 'Retina logo', 'aino' ),
			'description' => __( 'Scales the logo to half its uploaded size, making it sharp on high-res screens.', 'aino' ),
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
			'type'     => 'select',
			'priority' => 2,
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

	// Theme Options - Styles - Buttons bold.
	$wp_customize->add_setting(
		'buttons_bold',
		array(
			'default'           => aino_defaults( 'buttons_bold' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'buttons_bold',
		array(
			'label'    => esc_html__( 'Buttons font weight bold', 'aino' ),
			'section'  => 'aino_styles',
			'type'     => 'checkbox',
			'priority' => 2,
		)
	);

	// Theme Options - Styles - Buttons uppercase.
	$wp_customize->add_setting(
		'buttons_uppercase',
		array(
			'default'           => aino_defaults( 'buttons_uppercase' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'buttons_uppercase',
		array(
			'label'    => esc_html__( 'Buttons font uppercase', 'aino' ),
			'section'  => 'aino_styles',
			'type'     => 'checkbox',
			'priority' => 3,
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
			'label'    => esc_html__( 'Display Search Form', 'aino' ),
			'section'  => 'aino_header',
			'type'     => 'checkbox',
			'priority' => 1,
		)
	);

	// Theme Options - Header - Primary menu bold.
	$wp_customize->add_setting(
		'header_menu_bold',
		array(
			'default'           => aino_defaults( 'header_menu_bold' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_menu_bold',
		array(
			'label'    => esc_html__( 'Bold font in primary menu', 'aino' ),
			'section'  => 'aino_header',
			'type'     => 'checkbox',
			'priority' => 3,
		)
	);

	// Theme Options - Header - Primary menu uppercase.
	$wp_customize->add_setting(
		'header_menu_uppercase',
		array(
			'default'           => aino_defaults( 'header_menu_uppercase' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'header_menu_uppercase',
		array(
			'label'    => esc_html__( 'Uppercase font in primary menu', 'aino' ),
			'section'  => 'aino_header',
			'type'     => 'checkbox',
			'priority' => 4,
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
			'priority' => 3,
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
			'priority' => 4,
		)
	);

	// Theme Options - Footer - Footer Border Top.
	$wp_customize->add_setting(
		'footer_bordertop',
		array(
			'default'           => aino_defaults( 'footer_bordertop' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'footer_bordertop',
		array(
			'label'    => esc_html__( 'Display Border Top', 'aino' ),
			'section'  => 'aino_footer',
			'type'     => 'checkbox',
			'priority' => 5,
		)
	);

	// Theme Options - Footer - Footer Border Bottom.
	$wp_customize->add_setting(
		'footer_borderbottom',
		array(
			'default'           => aino_defaults( 'footer_borderbottom' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'footer_borderbottom',
		array(
			'label'    => esc_html__( 'Display Border Bottom', 'aino' ),
			'section'  => 'aino_footer',
			'type'     => 'checkbox',
			'priority' => 6,
		)
	);

	// Theme Options - Footer - Site info.
	$wp_customize->add_setting(
		'footer_siteinfo',
		array(
			'default'           => aino_defaults( 'footer_siteinfo' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'footer_siteinfo',
		array(
			'label'    => esc_html__( 'Custom Footer Info Text', 'aino' ),
			'section'  => 'aino_footer',
			'type'     => 'text',
			'priority' => 7,
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
			'label'       => esc_html__( 'Layout', 'aino' ),
			'description' => esc_html__( 'Choose the column layout of your blog, archives and search results.', 'aino' ),
			'section'     => 'aino_blog',
			'priority'    => 1,
			'type'        => 'select',
			'choices'     => array(
				'onecolumn'   => esc_html__( '1 column', 'aino' ),
				'twocolumn'   => esc_html__( '2 column', 'aino' ),
				'threecolumn' => esc_html__( '3 column', 'aino' ),
			),
		)
	);

	// Theme Options - Blog - Blog title.
	$wp_customize->add_setting(
		'blog_title',
		array(
			'default'           => aino_defaults( 'blog_title' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'blog_title',
		array(
			'label'       => esc_html__( 'Blog Title', 'aino' ),
			'description' => esc_html__( 'Add a custom blog title to your blog pages.', 'aino' ),
			'section'     => 'aino_blog',
			'priority'    => 2,
			'type'        => 'text',
		)
	);

	// Theme Options - Blog - Blog Title Description.
	$wp_customize->add_setting(
		'blog_title_description',
		array(
			'default'           => aino_defaults( 'blog_title_description' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'blog_title_description',
		array(
			'label'       => esc_html__( 'Blog Title Description', 'aino' ),
			'description' => esc_html__( 'Add a custom blog title description.', 'aino' ),
			'section'     => 'aino_blog',
			'priority'    => 3,
			'type'        => 'text',
		)
	);

	// Theme Options - Blog - Sticky Badge in white.
	$wp_customize->add_setting(
		'sticky_light',
		array(
			'default'           => aino_defaults( 'sticky_light' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sticky_light',
		array(
			'label'    => esc_html__( 'Display sticky badge in light colour.', 'aino' ),
			'section'  => 'aino_blog',
			'type'     => 'checkbox',
			'priority' => 4,
		)
	);

	/**
	 * Theme Options - Blog Cards
	 */
	// Theme Options - Blog Cards - Description.
	$wp_customize->add_setting(
		'blogcards_description',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'blogcards_description',
		array(
			'description' => esc_html__( 'Choose how to display posts on your blog, archives and search results.', 'aino' ),
			'section'     => 'aino_blogcards',
			'type'        => 'hidden',
			'priority'    => 1,
		)
	);

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
			'label'       => esc_html__( 'Border Radius', 'aino' ),
			'description' => esc_html__( 'Choose the degree of curvature on blog card edges in pixels.', 'aino' ),
			'section'     => 'aino_blogcards',
			'priority'    => 1,
			'type'        => 'select',
			'choices'     => array(
				'radius-none' => esc_html__( '0', 'aino' ),
				'radius-s'    => esc_html__( '24', 'aino' ),
				'radius-m'    => esc_html__( '36', 'aino' ),
				'radius-l'    => esc_html__( '42', 'aino' ),
			),
		)
	);

	// Theme Options - Blog Cards - Padding.
	$wp_customize->add_setting(
		'blogcards_padding',
		array(
			'default'           => aino_defaults( 'blogcards_padding' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'blogcards_padding',
		array(
			'label'    => esc_html__( 'Add inner spacing to Blog Card.', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 2,
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
			'label'    => esc_html__( 'Blog Card Shadow', 'aino' ),
			'section'  => 'aino_blogcards',
			'priority' => 3,
			'type'     => 'select',
			'choices'  => array(
				'shadow-none' => esc_html__( 'none', 'aino' ),
				'shadow-a'    => esc_html__( 'thin', 'aino' ),
				'shadow-b'    => esc_html__( 'thick', 'aino' ),
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
			'label'    => esc_html__( 'Blog Card Shadow on Hover', 'aino' ),
			'section'  => 'aino_blogcards',
			'priority' => 4,
			'type'     => 'select',
			'choices'  => array(
				'shadow-none' => esc_html__( 'none', 'aino' ),
				'shadow-a'    => esc_html__( 'thin', 'aino' ),
				'shadow-b'    => esc_html__( 'thick', 'aino' ),
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
			'priority' => 5,
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
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'post_excerpt_lengths',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'aino' ),
			'description' => esc_html__( 'Choose the number of words shown in excerpt. To hide excerpt set to zero.', 'aino' ),
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
			'priority' => 7,
		)
	);

	// Theme Options - Blog Cards - Display author instead of cats.
	$wp_customize->add_setting(
		'blogcards_author',
		array(
			'default'           => aino_defaults( 'blogcards_author' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'blogcards_author',
		array(
			'label'    => esc_html__( 'Display author', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 8,
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
			'priority' => 9,
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
			'priority' => 10,
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
			'label'    => esc_html__( 'Display comments count (Desktop only on blog pages)', 'aino' ),
			'section'  => 'aino_blogcards',
			'type'     => 'checkbox',
			'priority' => 11,
		)
	);

	// Theme Options - Single Post - Featured Images Style.
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
			'label'       => esc_html__( 'Featured Image Border Radius', 'aino' ),
			'description' => esc_html__( 'Choose the degree of curvature on featured image edges in pixels.', 'aino' ),
			'section'     => 'aino_singlepost',
			'priority'    => 1,
			'type'        => 'select',
			'choices'     => array(
				'radius-none' => esc_html__( '0', 'aino' ),
				'radius-s'    => esc_html__( '24', 'aino' ),
				'radius-m'    => esc_html__( '36', 'aino' ),
				'radius-l'    => esc_html__( '42', 'aino' ),
			),
		)
	);

	// Theme Options - Single Post - Display author info.
	$wp_customize->add_setting(
		'display_single_author',
		array(
			'default'           => aino_defaults( 'display_single_author' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'display_single_author',
		array(
			'label'    => esc_html__( 'Display author information in post header.', 'aino' ),
			'section'  => 'aino_singlepost',
			'type'     => 'checkbox',
			'priority' => 2,
		)
	);

	/**
	 * Colors Panel
	 */
	// Colors - Dark mode.
	$wp_customize->add_setting(
		'enable_dark_mode',
		array(
			'default'           => aino_defaults( 'enable_dark_mode' ),
			'sanitize_callback' => 'aino_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'enable_dark_mode',
		array(
			'label'       => esc_html__( 'Enable Dark Mode', 'aino' ),
			'description' => esc_html__( 'Your site will be shown with a dark background and light text.', 'aino' ),
			'section'     => 'colors',
			'type'        => 'checkbox',
			'priority'    => 1,
		)
	);

	// Colors - Main Background Color.
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
				'label'    => esc_html__( 'Background', 'aino' ),
				'section'  => 'colors',
				'priority' => 1,
			)
		)
	);

	// Colors - Primary.
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
				'label'       => esc_html__( 'Primary', 'aino' ),
				'description' => esc_html__( 'The primary text link hover and button background color.', 'aino' ),
				'section'     => 'colors',
				'priority'    => 2,
			)
		)
	);

	// Colors - Text One.
	$wp_customize->add_setting(
		'text_one_color',
		array(
			'default'           => aino_defaults( 'text_one_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_one_color',
			array(
				'label'       => esc_html__( 'Text One', 'aino' ),
				'description' => esc_html__( 'The heading text color.', 'aino' ),
				'section'     => 'colors',
				'priority'    => 3,
			)
		)
	);

	// Colors - Text Two.
	$wp_customize->add_setting(
		'text_two_color',
		array(
			'default'           => aino_defaults( 'text_two_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_two_color',
			array(
				'label'       => esc_html__( 'Text Two', 'aino' ),
				'description' => esc_html__( 'The default text color.', 'aino' ),
				'section'     => 'colors',
				'priority'    => 4,
			)
		)
	);

	// Colors - Button Text Color.
	$wp_customize->add_setting(
		'btn_text_color',
		array(
			'default'           => aino_defaults( 'btn_text_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'btn_text_color',
			array(
				'label'    => esc_html__( 'Button Text', 'aino' ),
				'section'  => 'colors',
				'priority' => 5,
			)
		)
	);

	// Colors - Footer Background Color.
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
				'section'  => 'colors',
				'priority' => 6,
				'settings' => 'footer_bg_color',
			)
		)
	);

	// Colors - Footer Border Color.
	$wp_customize->add_setting(
		'footer_border_color',
		array(
			'default'           => aino_defaults( 'footer_border_color' ),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_border_color',
			array(
				'label'    => esc_html__( 'Footer Borders', 'aino' ),
				'section'  => 'colors',
				'priority' => 7,
				'settings' => 'footer_border_color',
			)
		)
	);

		// Theme Options - Footer - Footer Light Text.
		$wp_customize->add_setting(
			'footer_light',
			array(
				'default'           => aino_defaults( 'footer_light' ),
				'sanitize_callback' => 'aino_sanitize_checkbox',
			)
		);
	
		$wp_customize->add_control(
			'footer_light',
			array(
				'label'       => esc_html__( 'Light Footer Text Colors', 'aino' ),
				'description' => esc_html__( 'Choose light Footer text color with a dark Footer background.', 'aino' ),
				'section'     => 'colors',
				'type'        => 'checkbox',
				'priority'    => 8,
			)
		);

	// Colors - Blog Cards Background Color.
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
				'label'    => esc_html__( 'Blog Cards Background', 'aino' ),
				'section'  => 'colors',
				'priority' => 9,
				'settings' => 'blogcards_bg_color',
			)
		)
	);

	// Colors - Blog Cards Background Hover Color.
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
				'label'    => esc_html__( 'Blog Cards Background on Hover', 'aino' ),
				'section'  => 'colors',
				'priority' => 10,
				'settings' => 'blogcards_bg_color_hover',
			)
		)
	);

}
add_action( 'customize_register', 'aino_customize_register' );
