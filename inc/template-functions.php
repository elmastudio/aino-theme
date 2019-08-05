<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package Aino
 * @since 0.0.1
 */

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

	if ( is_page_template( 'page-templates/tpl-fullwidth.php' ) ) {
		$classes[] = 'tpl-fullwidth';
	}

	if ( is_page_template( 'page-templates/tpl-fullwidth-notitle.php' ) ) {
		$classes[] = 'tpl-fullwidth';
		$classes[] = 'tpl-fullwidth-notitle';
	}

	if ( is_page_template( 'page-templates/tpl-fullscreen.php' ) ) {
		$classes[] = 'tpl-fullscreen';
	}

	// Classes for Menus.
	if ( has_nav_menu( 'menu-1' ) ) {
		$classes[] = 'has-nav-main';
	}

	if ( has_nav_menu( 'social' ) ) {
		$classes[] = 'has-nav-social';
	}

	if ( has_nav_menu( 'cta-header' ) ) {
		$classes[] = 'has-nav-cta';
	}

	// Customizer Options - Typography.
	if ( 'regular' === get_theme_mod( 'heading_fontweight', aino_defaults( 'heading_fontweight' ) ) ) {
		$classes[] = 'h-regular';
	}

	// Customizer Options - Styles.
	if ( 'squared' === get_theme_mod( 'button_style', aino_defaults( 'button_style' ) ) ) {
		$classes[] = 'btn-squared';
	}

	if ( 'round' === get_theme_mod( 'button_style', aino_defaults( 'button_style' ) ) ) {
		$classes[] = 'btn-round';
	}

	if ( 'squared' === get_theme_mod( 'form_style', aino_defaults( 'form_style' ) ) ) {
		$classes[] = 'form-squared';
	}

	if ( 'round' === get_theme_mod( 'form_style', aino_defaults( 'form_style' ) ) ) {
		$classes[] = 'form-round';
	}

	if ( 'radius-none' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-none';
	}

	if ( 'radius-s' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-s';
	}

	if ( 'radius-l' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-l';
	}

	// Customizer Options - Header.
	if ( true === get_theme_mod( 'header_search', aino_defaults( 'header_search' ) ) ) {
		$classes[] = 'header-search-hide';
	}

	if ( true === get_theme_mod( 'header_dividers', aino_defaults( 'header_dividers' ) ) ) {
		$classes[] = 'header-dividers-hide';
	}

	if ( true === get_theme_mod( 'header_border', aino_defaults( 'header_border' ) ) ) {
		$classes[] = 'header-border-hide';
	}

	// Customizer Options - Footer.
	if ( true === get_theme_mod( 'footerinfo_alignment', aino_defaults( 'footerinfo_alignment' ) ) ) {
		$classes[] = 'footerinfo-centered';
	}

	if ( true === get_theme_mod( 'footerwidget_alignment', aino_defaults( 'footerwidget_alignment' ) ) ) {
		$classes[] = 'footerwidgets-centered';
	}

	// Customizer Options - Blog.
	if ( 'onecolumn' === get_theme_mod( 'blog_columns', aino_defaults( 'blog_columns' ) ) ) {
		$classes[] = 'blog-1-column';
	}

	if ( 'twocolumn' === get_theme_mod( 'blog_columns', aino_defaults( 'blog_columns' ) ) ) {
		$classes[] = 'blog-2-column';
	}

	if ( 'threecolumn' === get_theme_mod( 'blog_columns', aino_defaults( 'blog_columns' ) ) ) {
		$classes[] = 'blog-3-column';
	}

	// Blog Display Options.
	if ( true !== get_theme_mod( 'post-publish-date', aino_defaults( 'post-publish-date' ) ) ) {
		$classes[] = 'no-postdate';
	}

	if ( true !== get_theme_mod( 'display_comments', aino_defaults( 'display_comments' ) ) ) {
		$classes[] = 'no-postcommentscount';
	}

	if ( true !== get_theme_mod( 'blogcards_authoravatar', aino_defaults( 'blogcards_authoravatar' ) ) ) {
		$classes[] = 'blogcard-avatar-hide';
	}

	// Blog Cards - Hover Animation.
	if ( 'cardhover_zoom' === get_theme_mod( 'blogcards_animation', aino_defaults( 'blogcards_animation' ) ) ) {
		$classes[] = 'cardhover-zoom';
	}

	if ( 'cardhover_moveup' === get_theme_mod( 'blogcards_animation', aino_defaults( 'blogcards_animation' ) ) ) {
		$classes[] = 'cardhover-moveup';
	}

	// Blog Cards - Border Radius.
	if ( 'radius-s' === get_theme_mod( 'blogcards_borderradius', aino_defaults( 'blogcards_borderradius' ) ) ) {
		$classes[] = 'blogcards-radius-s';
	}

	if ( 'radius-m' === get_theme_mod( 'blogcards_borderradius', aino_defaults( 'blogcards_borderradius' ) ) ) {
		$classes[] = 'blogcards-radius-m';
	}

	if ( 'radius-l' === get_theme_mod( 'blogcards_borderradius', aino_defaults( 'blogcards_borderradius' ) ) ) {
		$classes[] = 'blogcards-radius-l';
	}

	// Blog Cards - Shadow default.
	if ( 'shadow-a' === get_theme_mod( 'blogcards_shadow', aino_defaults( 'blogcards_shadow' ) ) ) {
		$classes[] = 'blogcards-shadow-a';
	}

	if ( 'shadow-b' === get_theme_mod( 'blogcards_shadow', aino_defaults( 'blogcards_shadow' ) ) ) {
		$classes[] = 'blogcards-shadow-b';
	}

	if ( 'shadow-c' === get_theme_mod( 'blogcards_shadow', aino_defaults( 'blogcards_shadow' ) ) ) {
		$classes[] = 'blogcards-shadow-c';
	}

	if ( 'shadow-d' === get_theme_mod( 'blogcards_shadow', aino_defaults( 'blogcards_shadow' ) ) ) {
		$classes[] = 'blogcards-shadow-d';
	}

	// Blog Cards - Shadow Hover.
	if ( 'shadow-a' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-shadowhover-a';
	}

	if ( 'shadow-b' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-shadowhover-b';
	}

	if ( 'shadow-c' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-shadowhover-c';
	}

	if ( 'shadow-d' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-shadowhover-d';
	}

	// Disable Flexbox Post Card Stretch.
	if ( get_theme_mod( 'main_bg_color', aino_defaults( 'main_bg_color' ) ) === get_theme_mod( 'blogcards_bgcolor', aino_defaults( 'blogcards_bgcolor' ) ) && 'blogcards-shadow-none' === get_theme_mod( 'blogcards_shadow', aino_defaults( 'blogcards_shadow' ) ) ) {
		$classes[] = 'blogcards-flexstart';
	}

	// Classes for Footer Widgets.
	if ( is_active_sidebar( 'footer-1' ) &&
		is_active_sidebar( 'footer-2' ) &&
		is_active_sidebar( 'footer-3' ) &&
		is_active_sidebar( 'footer-4' ) &&
		is_active_sidebar( 'footer-5' ) &&
		is_active_sidebar( 'footer-6' ) ) {
		$classes[] = 'footer-6-column';
	}

	if ( is_active_sidebar( 'footer-1' ) &&
		is_active_sidebar( 'footer-2' ) &&
		is_active_sidebar( 'footer-3' ) &&
		is_active_sidebar( 'footer-4' ) &&
		is_active_sidebar( 'footer-5' ) &&
		! is_active_sidebar( 'footer-6' ) ) {
		$classes[] = 'footer-5-column';
	}

	if ( is_active_sidebar( 'footer-1' ) &&
		is_active_sidebar( 'footer-2' ) &&
		is_active_sidebar( 'footer-3' ) &&
		is_active_sidebar( 'footer-4' ) &&
		! is_active_sidebar( 'footer-5' ) &&
		! is_active_sidebar( 'footer-6' ) ) {
		$classes[] = 'footer-4-column';
	}

	if ( is_active_sidebar( 'footer-1' ) &&
		is_active_sidebar( 'footer-2' ) &&
		is_active_sidebar( 'footer-3' ) &&
		! is_active_sidebar( 'footer-4' ) &&
		! is_active_sidebar( 'footer-5' ) &&
		! is_active_sidebar( 'footer-6' ) ) {
		$classes[] = 'footer-3-column';
	}

	if ( is_active_sidebar( 'footer-1' ) &&
		is_active_sidebar( 'footer-2' ) &&
		! is_active_sidebar( 'footer-3' ) &&
		! is_active_sidebar( 'footer-4' ) &&
		! is_active_sidebar( 'footer-5' ) &&
		! is_active_sidebar( 'footer-6' ) ) {
		$classes[] = 'footer-2-column';
	}

	if ( is_active_sidebar( 'footer-1' ) &&
		! is_active_sidebar( 'footer-2' ) &&
		! is_active_sidebar( 'footer-3' ) &&
		! is_active_sidebar( 'footer-4' ) &&
		! is_active_sidebar( 'footer-5' ) &&
		! is_active_sidebar( 'footer-6' ) ) {
		$classes[] = 'footer-1-column';
	}

	// Author classes:
	// Adds class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
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

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	return $classes;
}
add_filter( 'body_class', 'aino_body_classes' );

/**
 * Determines the estimated time to read a post, in minutes.
 */
function aino_get_estimated_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$count   = str_word_count( wp_strip_all_tags( $content ) );
	return (int) round( $count / 250 ); // Assuming 250 words per minute reading speed.
}

/**
 * Add Classes to dashboard to support theme options in editor styles.
 *
 * @param array $classes Classes for the body element.
 */
function aino_custom_admin_body_class( $classes ) {

	if ( 'bold' === get_theme_mod( 'heading_fontweight', 'regular' ) ) {
		$classes .= ' h-bold ';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'aino_custom_admin_body_class' );


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

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function aino_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo ' <link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '"> ';
	}
}
add_action( 'wp_head', 'aino_pingback_header' );
