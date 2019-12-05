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

	// Customizer Options - Header.
	if ( false === get_theme_mod( 'header_search', aino_defaults( 'header_search' ) ) ) {
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

	// Blog Cards - Shadow Hover.
	if ( 'shadow-a' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-shadowhover-a';
	}

	if ( 'shadow-b' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-shadowhover-b';
	}

	if ( 'shadow-none' === get_theme_mod( 'blogcards_shadow', aino_defaults( 'blogcards_shadow' ) ) && 'shadow-none' === get_theme_mod( 'blogcards_shadow_hover', aino_defaults( 'blogcards_shadow_hover' ) ) ) {
		$classes[] = 'blogcards-no-shadow';
	}

	// Single Post - Featured Image Border Radius.
	if ( 'radius-none' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-none';
	}

	if ( 'radius-s' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-s';
	}

	if ( 'radius-l' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-l';
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

/**
 * Add an extra menu to our nav for our priority+ navigation to use
 *
 * @param object $nav_menu  Nav menu.
 * @param object $args      Nav menu args.
 * @return string More link for hidden menu items.
 */
function aino_add_ellipses_to_nav( $nav_menu, $args ) {

	if ( 'menu-1' === $args->theme_location ) :

		$nav_menu .= '<div class="main-menu-more">';
		$nav_menu .= '<ul class="main-menu">';
		$nav_menu .= '<li class="menu-item menu-item-has-children">';
		$nav_menu .= '<button class="submenu-expand main-menu-more-toggle is-empty" tabindex="-1" aria-label="More" aria-haspopup="true" aria-expanded="false">';
		$nav_menu .= '<span class="screen-reader-text">' . esc_html__( 'More', 'aino' ) . '</span>';
		$nav_menu .= aino_get_svg(
			array( 'icon' => 'more_horiz-24px' )
		);
		$nav_menu .= '</button>';
		$nav_menu .= '<ul class="sub-menu hidden-links">';
		$nav_menu .= '<li id="menu-item--1" class="mobile-parent-nav-menu-item menu-item--1">';
		$nav_menu .= '<button class="menu-item-link-return">';
		$nav_menu .= aino_get_svg(
			array( 'icon' => 'arrow_back-24px' )
		);
		$nav_menu .= esc_html__( 'Back', 'aino' );
		$nav_menu .= '</button>';
		$nav_menu .= '</li>';
		$nav_menu .= '</ul>';
		$nav_menu .= '</li>';
		$nav_menu .= '</ul>';
		$nav_menu .= '</div>';

	endif;

	return $nav_menu;
}
add_filter( 'wp_nav_menu', 'aino_add_ellipses_to_nav', 10, 2 );

/**
 * WCAG 2.0 Attributes for Dropdown Menus
 *
 * Adjustments to menu attributes tot support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @ref https://www.w3.org/WAI/tutorials/menus/flyout/
 */
function aino_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

	// Add [aria-haspopup] and [aria-expanded] to menu items that have children
	$item_has_children = in_array( 'menu-item-has-children', $item->classes );
	if ( $item_has_children ) {
		$atts['aria-haspopup'] = 'true';
		$atts['aria-expanded'] = 'false';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'aino_nav_menu_link_attributes', 10, 4 );

/**
 * Add a dropdown icon to top-level menu items.
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 * @return string Nav menu item start element.
 * Add a dropdown icon to top-level menu items
 */
function aino_add_dropdown_icons( $output, $item, $depth, $args ) {

	// Only add class to 'top level' items on the 'primary' menu.
	if ( ! isset( $args->theme_location ) || 'menu-1' !== $args->theme_location ) {
		return $output;
	}

	if ( in_array( 'mobile-parent-nav-menu-item', $item->classes, true ) && isset( $item->original_id ) ) {
		// Inject the keyboard_arrow_left SVG inside the parent nav menu item, and let the item link to the parent item.
		// @todo Only do this for nested submenus? If on a first-level submenu, then really the link could be "#" since the desire is to remove the target entirely.
		$link = sprintf(
			'<button class="menu-item-link-return" tabindex="-1">%s',
			aino_get_svg( array( 'icon' => 'arrow_back-24px' ) )
		);

		// replace opening <a> with <button>
		$output = preg_replace(
			'/<a\s.*?>/',
			$link,
			$output,
			1 // Limit.
		);

		// replace closing </a> with </button>
		$output = preg_replace(
			'#</a>#i',
			'</button>',
			$output,
			1 // Limit.
		);

	} elseif ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add SVG icon to parent items.
		$icon = aino_get_svg(
			array( 'icon' => 'baseline-expand_more-24px' )
		);

		$output .= sprintf(
			'<button class="submenu-expand" tabindex="-1">%s</button>',
			$icon
		);
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'aino_add_dropdown_icons', 10, 4 );

/**
 * Create a nav menu item to be displayed on mobile to navigate from submenu back to the parent.
 *
 * This duplicates each parent nav menu item and makes it the first child of itself.
 *
 * @param array  $sorted_menu_items Sorted nav menu items.
 * @param object $args              Nav menu args.
 * @return array Amended nav menu items.
 */
function aino_add_mobile_parent_nav_menu_items( $sorted_menu_items, $args ) {
	static $pseudo_id = 0;
	if ( ! isset( $args->theme_location ) || 'menu-1' !== $args->theme_location ) {
		return $sorted_menu_items;
	}

	$amended_menu_items = array();
	foreach ( $sorted_menu_items as $nav_menu_item ) {
		$amended_menu_items[] = $nav_menu_item;
		if ( in_array( 'menu-item-has-children', $nav_menu_item->classes, true ) ) {
			$parent_menu_item                   = clone $nav_menu_item;
			$parent_menu_item->original_id      = $nav_menu_item->ID;
			$parent_menu_item->ID               = --$pseudo_id;
			$parent_menu_item->db_id            = $parent_menu_item->ID;
			$parent_menu_item->object_id        = $parent_menu_item->ID;
			$parent_menu_item->classes          = array( 'mobile-parent-nav-menu-item' );
			$parent_menu_item->menu_item_parent = $nav_menu_item->ID;

			$amended_menu_items[] = $parent_menu_item;
		}
	}

	return $amended_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'aino_add_mobile_parent_nav_menu_items', 10, 2 );
