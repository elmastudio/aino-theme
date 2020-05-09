<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aino
 */

/**
 * Table of Contents:
 * Disable Google fonts
 * Logo & Description
 * Post Meta
 * Comments
 * Menus
 * Classes
 * Miscellaneous
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
 * Logo & Description
 */
/**
 * Displays the site logo, either text or image.
 *
 * @param array   $args Arguments for displaying the site logo either as an image or text.
 * @param boolean $echo Echo or return the HTML.
 *
 * @return string $html Compiled HTML based on our arguments.
 */
function aino_site_logo( $args = array(), $echo = true ) {
	$logo       = get_custom_logo();
	$site_title = get_bloginfo( 'name' );
	$contents   = '';
	$classname  = '';

	$defaults = array(
		'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'  => 'site-logo',
		'title'       => '<a href="%1$s">%2$s</a>',
		'title_class' => 'site-title',
		'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
		'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
		'condition'   => ( is_front_page() || is_home() ),
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	 * Filters the arguments for `aino_site_logo()`.
	 *
	 * @param array  $args     Parsed arguments.
	 * @param array  $defaults Function's default arguments.
	 */
	$args = apply_filters( 'aino_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];
	}

	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html = sprintf( $args[ $wrap ], $classname, $contents );

	/**
	 * Filters the arguments for `aino_site_logo()`.
	 *
	 * @param string $html      Compiled html based on our arguments.
	 * @param array  $args      Parsed arguments.
	 * @param string $classname Class name based on current view, home or single.
	 * @param string $contents  HTML for site title or logo.
	 */
	$html = apply_filters( 'aino_site_logo', $html, $args, $classname, $contents );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

}

/**
 * Displays the site description.
 *
 * @param boolean $echo Echo or return the html.
 *
 * @return string $html The HTML to display.
 */
function aino_site_description( $echo = true ) {
	$description = get_bloginfo( 'description' );

	if ( ! $description ) {
		return;
	}

	$wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

	$html = sprintf( $wrapper, esc_html( $description ) );

	/**
	 * Filters the html for the site description.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html         The HTML to display.
	 * @param string $description  Site description via `bloginfo()`.
	 * @param string $wrapper      The format used in case you want to reuse it in a `sprintf()`.
	 */
	$html = apply_filters( 'aino_site_description', $html, $description, $wrapper );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Post Meta
 */
if ( ! function_exists( 'aino_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function aino_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$byline = sprintf(
			'<span class="author vcard"><span class="screen-reader-text">%1$s </span> <a class="url fn n" href="%2$s">%3$s</a></span>',
			esc_html_x( 'Author', 'Used before post author name.', 'aino' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		if ( get_avatar( get_the_author_meta( 'ID' ) ) ) :
			echo '<figure class="author-avatar" aria-hidden="true"><a class="author-avatar-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" tabindex="-1">' . get_avatar( get_the_author_meta( 'ID' ), 80 ) . '</a></figure>';

		endif;

		echo '<span class="author-meta-info"><span class="byline"> ' . wp_kses_post( $byline ) . '</span><span class="posted-on">' . $posted_on . '</span>';

	}
	endif;


if ( ! function_exists( 'aino_entry_date_blog' ) ) :
	/**
	 * Prints HTML with information for the current post-date/time and number of comments.
	 */
	function aino_entry_date_blog() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="posted-on">' . $time_string . '</span>';

	}
endif;


if ( ! function_exists( 'aino_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories and tags.
	 */
	function aino_entry_meta() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aino' ) );

		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( $categories_list && ! is_single() ) {
				printf(
					'<span class="entry-cats">' . ( '%1$s' ) . '</span>',
					wp_kses_post( $categories_list )
				);
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ( ' ' ) );
			if ( $tags_list && is_single() ) {
				printf(
					'<span class="entry-tags">' . ( '%1$s' ) . '</span>',
					wp_kses_post( $tags_list )
				);
			}
		}
	}
endif;

if ( ! function_exists( 'aino_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 */
	function aino_edit_link() {

		$editlink = sprintf(
			esc_html__( 'Edit Post', 'aino' ) . '<span class="edit-link">' . aino_get_svg( array( 'icon' => 'baseline-edit-24px' ) ) . '</span><span class="screen-reader-text">' . get_the_title() . '</span>'
		);

		// Edit post link.
		edit_post_link(
			$editlink
		);
	}
endif;

/**
 * Comments
 */
/**
 * Custom Aino Comment structure.
 *
 * @param  mixed $comment Custom comment parameter.
 * @param  mixed $args Comment arguments.
 * @param  mixed $depth Depth of the comment.
 *
 * @return void
 */
function aino_comment( $comment, $args, $depth ) {
	global $post;

	// Checks if we are using a div or ol|ul for our output.
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
	<article id="div-comment- <?php comment_ID(); ?>" class="comment-body">
		<div class="avatar-content-wrap">
			<?php
			if ( 0 !== $args['avatar_size'] ) {
				echo '<span class="comment-avatar">';
				echo get_avatar( $comment, $args['avatar_size'] );
				echo '</span>';
			}
			?>
			<div class="comment-content-wrap">
				<div class="comment-author vcard">
				<?php
				printf(
					/* translators: %s: Name of comment author. */
					'<b class="fn">%s</b> %2$s',
					get_comment_author_link( $comment ),
					// If current post author is also comment author, make it known visually.
					( $comment->user_id === $post->post_author ) ? '<span class="author-badge">' . esc_html__( 'Author', 'aino' ) . '</span>' : ''
				);
				?>
				</div><!-- .comment-author -->
					<?php comment_text(); ?>
			</div><!-- .comment-content-wrap -->
		</div><!-- .avatar-content-wrap -->

		<div class="comment-meta">
			<div class="comment-metadata">
				<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
					<time datetime="<?php comment_time( 'c' ); ?>">
					<?php
					printf(
						/* translators: 1: The comment date. 2: the comment time. */
						esc_html__( '%1$s at %2$s', 'aino' ),
						esc_html( get_comment_date( '', $comment ) ),
						esc_html( get_comment_time() )
					);
					?>
					</time>
				</a>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class = "reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
				<?php edit_comment_link( __( 'Edit', 'aino' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .comment-metadata -->

			<?php if ( '0' === $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'aino' ); ?></p>
			<?php endif; ?>
		</div><!-- .comment-meta -->
	</article><!-- .comment-body -->
	<?php
}


/**
 * Menus
 */
/**
 * Filter Classes of wp_list_pages items to match menu items.
 * Filter the class applied to wp_list_pages() items with children to match the menu class, to simplify.
 * styling of sub levels in the fallback. Only applied if the match_menu_classes argument is set.
 *
 * @param array  $css_class CSS Class names.
 * @param string $item Comment.
 * @param int    $depth Depth of the current comment.
 * @param array  $args An array of arguments.
 * @param string $current_page Whether or not the item is the current item.
 *
 * @return array $css_class CSS Class names.
 */
function aino_filter_wp_list_pages_item_classes( $css_class, $item, $depth, $args, $current_page ) {

	// Only apply to wp_list_pages() calls with match_menu_classes set to true.
	$match_menu_classes = isset( $args['match_menu_classes'] );

	if ( ! $match_menu_classes ) {
		return $css_class;
	}

	// Add current menu item class.
	if ( in_array( 'current_page_item', $css_class, true ) ) {
		$css_class[] = 'current-menu-item';
	}

	// Add menu item has children class.
	if ( in_array( 'page_item_has_children', $css_class, true ) ) {
		$css_class[] = 'menu-item-has-children';
	}

	return $css_class;

}

add_filter( 'page_css_class', 'aino_filter_wp_list_pages_item_classes', 10, 5 );

/**
 * Add a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @param stdClass $args An array of arguments.
 * @param string   $item Menu item.
 * @param int      $depth Depth of the current menu item.
 *
 * @return stdClass $args An object of wp_nav_menu() arguments.
 */
function aino_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		// Wrap the menu item link contents in a div, used for positioning.
		$args->before = '<div class="ancestor-wrapper">';
		$args->after  = '';

		// Add a toggle to items with children.
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
			$toggle_duration      = aino_toggle_duration();

			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'aino' ) . '</span>' . aino_get_svg( array( 'icon' => 'baseline-chevron_right-24px' ) ) . '</button>';

		}

		// Close the wrapper.
		$args->after .= '</div><!-- .ancestor-wrapper -->';

		// Add sub menu icons to the primary menu without toggles.
	} elseif ( 'primary' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<span class="icon"></span>';
		} else {
			$args->after = '';
		}
	}

	return $args;

}

add_filter( 'nav_menu_item_args', 'aino_add_sub_toggles_to_main_menu', 10, 3 );


/**
 * Classes
 */
/**
 * Add No-JS Class.
 * If we're missing JavaScript support, the HTML element will have a no-js class.
 */
function aino_no_js_class() {

	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}

add_action( 'wp_head', 'aino_no_js_class' );

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

	if ( is_page_template( 'page-templates/tpl-fullscreen-light.php' ) ) {
		$classes[] = 'tpl-fullscreen';
		$classes[] = 'header-light';
	}

	if ( is_page_template( 'page-templates/tpl-hero.php' ) ) {
		$classes[] = 'tpl-hero';
	}

	if ( is_page_template( 'page-templates/tpl-hero-light.php' ) ) {
		$classes[] = 'tpl-hero';
		$classes[] = 'header-light';
	}

	// Classes for Menus.
	if ( has_nav_menu( 'primary' ) ) {
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
	if ( 'curved' === get_theme_mod( 'button_style', aino_defaults( 'button_style' ) ) ) {
		$classes[] = 'btn-curved';
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

	if ( true === get_theme_mod( 'buttons_bold', aino_defaults( 'button_bold' ) ) ) {
		$classes[] = 'buttons-bold';
	}

	if ( true === get_theme_mod( 'buttons_uppercase', aino_defaults( 'button_uppercase' ) ) ) {
		$classes[] = 'buttons-uppercase';
	}

	// Customizer Options - Site Identity.
	if ( true === get_theme_mod( 'sitedescription', aino_defaults( 'sitedescription' ) ) ) {
		$classes[] = 'tagline-hide';
	}

	// Customizer Options - Header.
	if ( true === get_theme_mod( 'header_search', aino_defaults( 'header_search' ) ) ) {
		$classes[] = 'has-header-search';
	}

	if ( true === get_theme_mod( 'header_menu_bold', aino_defaults( 'header_menu_bold' ) ) ) {
		$classes[] = 'menu-bold';
	}

	if ( true === get_theme_mod( 'header_menu_uppercase', aino_defaults( 'header_menu_uppercase' ) ) ) {
		$classes[] = 'menu-uppercase';
	}

	// Customizer Options - Footer.
	if ( true === get_theme_mod( 'footer_light', aino_defaults( 'footer_light' ) ) ) {
		$classes[] = 'footer-light';
	}

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

	if ( 'radius-m' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-m';
	}

	if ( 'radius-l' === get_theme_mod( 'featuredimg_style', aino_defaults( 'featuredimg_style' ) ) ) {
		$classes[] = 'featuredimg-radius-l';
	}

	if ( true === get_theme_mod( 'comments_border', aino_defaults( 'comments_border' ) ) ) {
		$classes[] = 'comments-border';
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
 * Miscellaneous
 */
/**
 * Toggle animation duration in milliseconds.
 *
 * @return integer Duration in milliseconds
 */
function aino_toggle_duration() {
	/**
	 * Filters the animation duration/speed used usually for submenu toggles.
	 *
	 * @since 1.0
	 *
	 * @param integer $duration Duration in milliseconds.
	 */
	$duration = apply_filters( 'aino_toggle_duration', 250 );

	return $duration;
}

/**
 * Determines the estimated time to read a post, in minutes.
 */
function aino_get_estimated_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$count   = str_word_count( wp_strip_all_tags( $content ) );
	return (int) round( $count / 250 ); // Assuming 250 words per minute reading speed.
}

if ( ! function_exists( 'aino_estimated_read_time' ) ) :
	/**
	 * Prints HTML with the estimated reading time. Does not display when time to read is zero.
	 */
	function aino_estimated_read_time() {
		$minutes = aino_get_estimated_reading_time();
		if ( 0 === $minutes ) {
			return null;
		}
		$datetime_attr = sprintf(
			'%dm 0s',
			$minutes
		);
		/* translators: 1: The [datetime] attribute for the <time> tag. 2: Estimated reading time text, in minutes. */
		$read_time_text = sprintf( _nx( '%s min read', '%s min read', $minutes, 'Time to read', 'aino' ), $minutes );
		printf(
			'<span class="reading-time"><time datetime="%1$s"></time>%2$s</span>',
			esc_html( $datetime_attr ),
			esc_html( $read_time_text )
		);
	}
endif;

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function aino_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo ' <link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '"> ';
	}
}
add_action( 'wp_head', 'aino_pingback_header' );
