<?php
if ( ! function_exists( 'aino_setup' ) ) :
	function aino_setup() {

		// Adding support for featured images.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1800, 99999 );

		// Adds custom image sizes.
		add_image_size( 'aino-thumb', 1800, 1012, true ); // Image Ratio 16:9.

		// Register Navigation menus.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'aino' ),
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( array( 'assets/build/css/editor.css', aino_fonts_url() ) );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

		// Add support for the WooCommerce.
		add_theme_support( 'woocommerce' );

		// Disable WooCommerce default styling.
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	}
	endif;
	add_action( 'after_setup_theme', 'aino_setup' );

/**
 * Enqueue scripts and styles.
 */
function aino_scripts() {
	// Enqueue fonts stylesheet.
	wp_enqueue_style( 'aino-fonts', aino_fonts_url(), array(), wp_get_theme()->get( 'Version' ) );
	// Theme stylesheet.
	wp_enqueue_style( 'aino-style', get_template_directory_uri() . '/assets/build/css/main.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'aino_scripts' );

/**
 * Get Google fonts and save locally with WPTT Webfont Loader.
 */
function aino_fonts_url() {
	$font_families = array(
		'Arimo:ital,wght@0,400;0,700;1,400;1,700',
		'PT+Serif:ital,wght@0,400;0,700;1,400;1,700'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/**
 * Restores the Customizer since we still rely on it.
 */
function aino_restore_customizer() {
	// There's no need to return anything.
	// The empty callback will do the trick.
}
add_action( 'customize_register', 'aino_restore_customizer' );

// Theme Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Theme Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/**
 * TGMPA plugin activation.
 */
require_once get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'aino_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function aino_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(

		array(
			'name'      => 'Aino Blocks - Creative Block Collection',
			'slug'      => 'aino-blocks',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'aino',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
