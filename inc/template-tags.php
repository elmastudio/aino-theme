<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aino
 */

/**
 * Disable Google fonts.
 */
function aino_remove_google_fonts() {

	if ( true === get_theme_mod( 'disable_googlefonts', aino_defaults( 'disable_googlefonts' ) ) ) {
		wp_dequeue_style( 'aino-fonts' );
		wp_deregister_style( 'aino-fonts' );
	}
}

add_action( 'wp_enqueue_scripts', 'aino_remove_google_fonts', 100 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aino_body_classes( $classes ) {

	// Classes for Page Templates.
	if ( is_archive() || is_search() ) {
		$classes[] = 'blog-archive';
	}

	if ( is_page() ) {
		$classes[] = 'single-page';
	}

	// Classes for Menus.
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-nav-main';
	}

	// Additional classes:
	// Adds a class of blog, if it's a blog page.
	if ( is_home() ) {
		$classes[] = 'blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'aino_body_classes' );
