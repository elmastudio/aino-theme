<?php
/**
 * Aino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aino
 * @since Aino 1.0.0
 */

if ( ! function_exists( 'aino_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Aino 1.0.0
	 *
	 * @return void
	 */
	function aino_support() {

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/build/css/editor.css' );

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

		// Add support for the WooCommerce.
		add_theme_support( 'woocommerce' );

		// Disable WooCommerce default styling.
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	}
	endif;
add_action( 'after_setup_theme', 'aino_support' );


if ( ! function_exists( 'aino_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Aino 1.0.0
	 *
	 * @return void
	 */
	function aino_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'aino-style',
			get_template_directory_uri() . '/assets/build/css/main.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'aino-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'aino_styles' );

/**
 * Restores the Customizer since we still rely on it.
 */
function aino_restore_customizer() {
	// There's no need to return anything.
	// The empty callback will do the trick.
}
add_action( 'customize_register', 'aino_restore_customizer' );

/**
 * Register theme block patterns.
 * 
 */
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Register theme block styles.
 * 
 */
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
			'name'      => 'Aino Blocks - Gutenberg Page Builder Blocks',
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
