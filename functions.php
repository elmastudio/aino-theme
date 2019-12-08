<?php
/**
 * Aino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aino
 * @since 0.0.1
 */

if ( ! function_exists( 'aino_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aino_setup() {
		/**
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'aino', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1500, 99999 );

		/**
		 * Adds custom image sizes.
		 */
		add_image_size( 'aino-l', 1200, 800, true ); // Image Ratio 3:2.
		add_image_size( 'aino-m', 681, 454, true ); // Image Ratio 3:2.
		add_image_size( 'aino-s-squared', 96, 96, true );

		// Register Navigation menus.
		register_nav_menus(
			array(
				'menu-1'        => esc_html__( 'Primary Menu', 'aino' ),
				'cta-header'    => esc_html__( 'Header Buttons (Desktop only)', 'aino' ),
				'social'        => esc_html__( 'Header Social Menu (Desktop only)', 'aino' ),
				'social-footer' => esc_html__( 'Footer Social Menu', 'aino' ),
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 100,
				'height'      => 32,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Enqueue fonts in the editor.
		add_editor_style( aino_fonts_url() );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Extra Extra Small', 'aino' ),
					'shortName' => __( 'XXS', 'aino' ),
					'size'      => 12,
					'slug'      => 'xxs',
				),
				array(
					'name'      => __( 'Extra Small', 'aino' ),
					'shortName' => __( 'XS', 'aino' ),
					'size'      => 14,
					'slug'      => 'xs',
				),
				array(
					'name'      => __( 'Small', 'aino' ),
					'shortName' => __( 'S', 'aino' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'aino' ),
					'shortName' => __( 'M', 'aino' ),
					'size'      => 19,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'aino' ),
					'shortName' => __( 'L', 'aino' ),
					'size'      => 27,
					'slug'      => 'large',
				),
			)
		);

		// Editor color palette.
		$color_primary_one    = get_theme_mod( 'primary_one_color' );
		$color_primary_two    = get_theme_mod( 'primary_two_color' );
		$color__secondary_one = get_theme_mod( 'secondary_one_color' );

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary One', 'aino' ),
					'slug'  => 'primary-one',
					'color' => $color_primary_one,
				),
				array(
					'name'  => __( 'Primary Two', 'aino' ),
					'slug'  => 'primary-two',
					'color' => $color_primary_two,
				),
				array(
					'name'  => __( 'Secondary One', 'aino' ),
					'slug'  => 'secondary-one',
					'color' => $color__secondary_one,
				),
				array(
					'name'  => __( 'Text One', 'aino' ),
					'slug'  => 'text-one',
					'color' => '#212429',
				),
				array(
					'name'  => __( 'Text Two', 'aino' ),
					'slug'  => 'text-two',
					'color' => '#495057',
				),
				array(
					'name'  => __( 'Text Three', 'aino' ),
					'slug'  => 'text-three',
					'color' => '#b3b9ce',
				),
				array(
					'name'  => __( 'Border', 'aino' ),
					'slug'  => 'border',
					'color' => '#dde2e5',
				),
				array(
					'name'  => __( 'Background', 'aino' ),
					'slug'  => 'background',
					'color' => '#f7f7ff',
				),
				array(
					'name'  => __( 'Notification', 'aino' ),
					'slug'  => 'notification',
					'color' => '#61b7ff',
				),
				array(
					'name'  => __( 'Error', 'aino' ),
					'slug'  => 'error',
					'color' => '#ea5c6f',
				),
				array(
					'name'  => __( 'Success', 'aino' ),
					'slug'  => 'success',
					'color' => '#15c26b',
				),
				array(
					'name'  => __( 'black', 'aino' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'white', 'aino' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
	endif;
	add_action( 'after_setup_theme', 'aino_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function aino_content_width() {
	// This variable is intended to be overruled from themes.
	// phpcs:disable WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	if ( is_page_template( 'page-templates/tpl-fullwidth.php' ) || is_page_template( 'page-templates/tpl-fullwidth-notitle.php' ) ) {
		$GLOBALS['content_width'] = apply_filters( 'aino_content_width', 1200 );
	}
	if ( is_page_template( 'page-templates/tpl-fullscreen.php' ) ) {
		$GLOBALS['content_width'] = apply_filters( 'aino_content_width', 2010 );
	} else {
		$GLOBALS['content_width'] = apply_filters( 'aino_content_width', 680 );
	}
	// phpcs:enable
}
add_action( 'after_setup_theme', 'aino_content_width', 0 );

/**
 * Register custom fonts.
 */
function aino_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Roboto, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto = esc_html_x( 'on', 'Roboto font: on or off', 'aino' );

	if ( 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,400i,700,700i&display=optional';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Register widget area.
 */
function aino_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'aino' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in the 1. column of your footer.', 'aino' ),
			'before_widget' => '<section id = "%1$s" class = "widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class   = "widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'aino' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in the 2. column of your footer.', 'aino' ),
			'before_widget' => '<section id = "%1$s" class = "widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class   = "widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'aino' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here to appear in the 3. column of your footer.', 'aino' ),
			'before_widget' => '<section id = "%1$s" class = "widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class   = "widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'aino' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here to appear in the 4. column of your footer.', 'aino' ),
			'before_widget' => '<section id = "%1$s" class = "widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class   = "widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 5', 'aino' ),
			'id'            => 'footer-5',
			'description'   => esc_html__( 'Add widgets here to appear in the 5. column of your footer.', 'aino' ),
			'before_widget' => '<section id = "%1$s" class = "widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class   = "widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 6', 'aino' ),
			'id'            => 'footer-6',
			'description'   => esc_html__( 'Add widgets here to appear in the 6. column of your footer.', 'aino' ),
			'before_widget' => '<section id = "%1$s" class = "widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class   = "widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'aino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aino_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'aino-fonts', aino_fonts_url(), false, wp_get_theme()->get( 'Version' ), 'all' );

	// Theme stylesheet.
	wp_enqueue_style( 'aino-style', get_stylesheet_uri(), false, wp_get_theme()->get( 'Version' ) );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'aino-priority-menu', get_theme_file_uri( '/assets/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'aino-touch-navigation', get_theme_file_uri( '/assets/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
	}

	wp_enqueue_script( 'aino-custom', get_theme_file_uri( '/assets/js/custom.js' ), array(), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'aino_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function aino_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assetsjs/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'aino_skip_link_focus_fix' );

/**
 * Add a custom max excerpt length.
 *
 * @param string $limit Maximum number of words in excerpt text.
 */
function aino_custom_excerpt_length( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt ) . '&hellip;';
	} else {
		$excerpt = implode( ' ', $excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

	return $excerpt;
}

/**
 * Replace "[...]" with custom read more in excerpts.
 *
 * @param array $more value for custom excerpt ending.
 */
function aino_excerpt_more( $more ) {
	global $post;
	return '&hellip;';
}
add_filter( 'excerpt_more', 'aino_excerpt_more' );

/**
 * Customize Author Archive Title.
 */
add_filter(
	'get_the_archive_title',
	function ( $title ) {
		if ( is_author() ) {
			$title = '<span>' . esc_html__( 'All posts by', 'aino' ) . '</span>'; }
		if ( is_category() ) {
			$title = '<span>' . esc_html__( 'Filed under', 'aino' ) . '</span>' . single_cat_title( '', false ); }
		if ( is_tag() ) {
			$title = '<span>' . esc_html__( 'Filed under', 'aino' ) . '</span>' . single_tag_title( '', false ); }
		return $title;
	}
);

/**
 * Get list of post categories without links.
 */
function aino_the_categories() {
	$cats = array();
	foreach ( get_the_category() as $c ) {
		$cat = get_category( $c );
		array_push(
			$cats,
			$cat->name
		);
	}

	if ( count( $cats ) > 0 ) {
		$post_categories = implode( ', ', $cats );
	} else {
		$post_categories = '';
	}

	echo esc_attr( $post_categories );
}

/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */
function aino_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Additional features to allow styling of the templates.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/defaults.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-css.php';
require get_template_directory() . '/inc/customizer/customizer-editor.php';
require get_template_directory() . '/inc/customizer/sanitization-callbacks.php';

/**
* Load Jetpack compatibility file.
*/
require get_template_directory() . '/inc/jetpack.php';

/**
* SVG icons functions and filters.
*/
require get_parent_theme_file_path( '/inc/icon-functions.php' );
