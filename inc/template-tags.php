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

	if ( is_page_template( 'page-templates/block-shop.php' ) ) {
		$classes[] = 'tpl-shop';
	}

	if ( is_page_template( 'page-templates/tpl-fullscreen.php' ) ) {
		$classes[] = 'tpl-fullscreen';
	}

	// Classes for Menus.
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-nav-main';
	}


	if ( 'round' === get_theme_mod( 'button_style', aino_defaults( 'button_style' ) ) ) {
		$classes[] = 'btn-round';
	}

	if ( 'curved' === get_theme_mod( 'form_style', aino_defaults( 'form_style' ) ) ) {
		$classes[] = 'form-curved';
	}

	if ( 'round' === get_theme_mod( 'form_style', aino_defaults( 'form_style' ) ) ) {
		$classes[] = 'form-round';
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


/**
 * Add Classes to posts and pages.
 *
 * @param  mixed $classes This is a description.
 * @param  mixed $class This is a description.
 * @param  mixed $post_id This is a description.
 *
 * @return array
 */
function aino_post_classes( $classes, $class, $post_id ) {

	if ( comments_open( $post_id ) ) {
		$classes[] = 'comments-open';
	}

	if ( ! comments_open( $post_id ) ) {
		$classes[] = 'comments-closed';
	}

	if ( 0 === get_comments_number( $post_id ) ) {
		$classes[] = 'no-comments';
	}

	if ( 0 !== get_comments_number( $post_id ) ) {
		$classes[] = 'has-comments';
	}

	return $classes;
}
add_filter( 'post_class', 'aino_post_classes', 10, 3 );
