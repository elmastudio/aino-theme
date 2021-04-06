<?php
/**
 * Aino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aino
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

		// Custom logo.
		$logo_width  = 170;
		$logo_height = 48;

		// If the retina setting is active, double the recommended width and height.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width * 2 );
			$logo_height = floor( $logo_height * 2 );
		}

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => $logo_height,
				'width'       => $logo_width,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Register Navigation menus.
		register_nav_menus(
			array(
				'primary'       => esc_html__( 'Primary Menu', 'aino' ),
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
					'name'      => __( 'XXS', 'aino' ),
					'shortName' => __( 'XXS', 'aino' ),
					'size'      => 12,
					'slug'      => 'xxs',
				),
				array(
					'name'      => __( 'XS', 'aino' ),
					'shortName' => __( 'XS', 'aino' ),
					'size'      => 14,
					'slug'      => 'xs',
				),
				array(
					'name'      => __( 'S', 'aino' ),
					'shortName' => __( 'S', 'aino' ),
					'size'      => 16,
					'slug'      => 's',
				),
				array(
					'name'      => __( 'M', 'aino' ),
					'shortName' => __( 'M', 'aino' ),
					'size'      => 20,
					'slug'      => 'm',
				),
				array(
					'name'      => __( 'L', 'aino' ),
					'shortName' => __( 'L', 'aino' ),
					'size'      => 24,
					'slug'      => 'l',
				),
				array(
					'name'      => __( 'XL', 'aino' ),
					'shortName' => __( 'XL', 'aino' ),
					'size'      => 28,
					'slug'      => 'xl',
				),
				array(
					'name'      => __( 'XXL', 'aino' ),
					'shortName' => __( 'XXL', 'aino' ),
					'size'      => 34,
					'slug'      => 'xxl',
				),
				array(
					'name'      => __( '3XL', 'aino' ),
					'shortName' => __( '3XL', 'aino' ),
					'size'      => 40,
					'slug'      => 'xxxl',
				),
				array(
					'name'      => __( '4XL', 'aino' ),
					'shortName' => __( '4XL', 'aino' ),
					'size'      => 48,
					'slug'      => 'xxxxl',
				),
			)
		);

		// Disabling custom font sizes.
		add_theme_support( 'disable-custom-font-sizes' );

		// Editor color palette.
		$color_primary_one = get_theme_mod( 'primary_one_color' );
		$main_bg_color     = get_theme_mod( 'main_bg_color' );

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'aino' ),
					'slug'  => 'primary-one',
					'color' => $color_primary_one,
				),
				array(
					'name'  => __( 'Text One', 'aino' ),
					'slug'  => 'text-one',
					'color' => '#111111',
				),
				array(
					'name'  => __( 'Text Two', 'aino' ),
					'slug'  => 'text-two',
					'color' => '#111111',
				),
				array(
					'name'  => __( 'Background', 'aino' ),
					'slug'  => 'background',
					'color' => $main_bg_color,
				),
				array(
					'name'  => __( 'Black', 'aino' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'White', 'aino' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => __( 'Grayish blue to dark grayish blue', 'aino' ),
					'gradient' => 'linear-gradient(0deg,rgb(91, 108, 114) 0%,rgb(60, 68, 72) 100%)',
					'slug'     => 'grayish-blue-to-dark-grayish-blue',
				),
				array(
					'name'     => __( 'Soft orange to desaturated dark cyan', 'aino' ),
					'gradient' => 'linear-gradient(270deg,rgb(67, 92, 103) 0%, rgb(114, 164, 163) 46%,rgb(251, 162, 137) 74%, rgb(252, 202, 164) 100%)',
					'slug'     => 'soft-orange-to-desaturated-dark-cyan',
				),
				array(
					'name'     => __( 'Light grayish magenta to very dark grayish pink', 'aino' ),
					'gradient' => 'linear-gradient(0deg,rgb(237, 221, 237) 0%, rgb(230, 196, 223) 21%,rgb(196, 165, 191) 50%, rgb(112, 93, 99) 100%)',
					'slug'     => 'light-grayish-magenta-to-very-dark-grayish-pink',
				),
				array(
					'name'     => __( 'Light grayish red to dark red', 'aino' ),
					'gradient' => 'linear-gradient(0deg,rgb(143, 34, 40) 0%, rgb(250, 110, 115) 50%, rgb(219, 191, 193) 100%)',
					'slug'     => 'light-grayish-red-to-dark-red',
				),
				array(
					'name'     => __( 'Slightly desaturated cyan to very soft red', 'aino' ),
					'gradient' => 'linear-gradient(0deg,rgb(129, 195, 198) 0%, rgb(251, 198, 167) 48%, rgb(251, 198, 167) 100%)',
					'slug'     => 'slightly-desaturated-cyan-to-very-soft-red',
				),
				array(
					'name'     => __( 'Very soft orange to very soft pink', 'aino' ),
					'gradient' => 'radial-gradient(circle at bottom, rgb(251, 219, 190) 0%, rgb(252, 170, 161) 26%, rgb(250, 152, 162) 54%,rgb(246, 182, 211) 75%, rgb(250, 232, 243) 100%)',
					'slug'     => 'very-soft-orange-to-very-soft-pink',
				),
				array(
					'name'     => __( 'Grayish violet to soft orange', 'aino' ),
					'gradient' => 'linear-gradient(180deg, rgb(173, 160, 191) 0%, rgb(225, 205, 236) 29%, rgb(243, 206, 225) 51%, rgb(241, 196, 141) 72%, rgb(240, 193, 97) 100%)',
					'slug'     => 'grayish-violet-to-soft-orange',
				),
				array(
					'name'     => __( 'Light grayish red to dark grayish blue', 'aino' ),
					'gradient' => 'linear-gradient(180deg, rgb(252, 202, 210) 0%, rgb(222, 158, 167) 46%, rgb(118, 119, 135) 100%)',
					'slug'     => 'light-grayish-red-to-dark-grayish-blue',
				),
				array(
					'name'     => __( 'Light grayish red to very soft blue', 'aino' ),
					'gradient' => 'linear-gradient(135deg, rgb(237, 204, 211) 0%, rgb(177, 181, 225) 100%)',
					'slug'     => 'light-grayish-red-to-very-soft-blue',
				),
				array(
					'name'     => __( 'Soft blue to lime green', 'aino' ),
					'gradient' => 'linear-gradient(0deg, rgb(104, 134, 254) 0%, rgb(255, 255, 255) 49%, rgb(255, 255, 255) 61%, rgb(213, 233, 207) 75%, rgb(8, 179, 82) 100%)',
					'slug'     => 'soft-blue-to-lime-green',
				),
				array(
					'name'     => __( 'Soft blue to dark moderate violet', 'aino' ),
					'gradient' => 'linear-gradient(135deg, rgb(103, 125, 239) 0%, rgb(117, 72, 166) 100%)',
					'slug'     => 'soft-blue-to-dark-moderate-violet',
				),
				array(
					'name'     => __( 'Soft red to very soft blue', 'aino' ),
					'gradient' => 'linear-gradient(0deg, rgb(250, 110, 90) 0%, rgb(255, 202, 192) 24%, rgb(255, 255, 255) 48%, rgb(255, 255, 255) 62%, rgb(223, 227, 255) 77%, rgb(157, 144, 250) 100%)',
					'slug'     => 'soft-red-to-very-soft-blue',
				),
				array(
					'name'     => __( 'Dark blue to mostly black blue', 'aino' ),
					'gradient' => 'radial-gradient(circle at bottom, rgb(19, 20, 143) 0%, rgb(13, 11, 24) 100%)',
					'slug'     => 'dark-blue-to-mostly-black-blue',
				),
				array(
					'name'     => __( 'Very soft blue to dark grayish blue', 'aino' ),
					'gradient' => 'radial-gradient(circle at bottom, rgb(153, 203, 233) 0%, rgb(121, 132, 157) 100%)',
					'slug'     => 'very-soft-blue-to-dark-grayish-blue',
				),
				array(
					'name'     => __( 'Soft pink to mostly pure orange', 'aino' ),
					'gradient' => 'radial-gradient(circle at bottom, rgb(253, 79, 156) 0%, rgb(254, 132, 0) 100%)',
					'slug'     => 'soft-pink-to-mostly-pure-orange',
				),
				array(
					'name'     => __( 'Bright cyan to soft magenta', 'aino' ),
					'gradient' => 'linear-gradient( 0deg, rgb(48, 203, 247) 0%, rgb(254, 128, 254) 100%)',
					'slug'     => 'bright-cyan-to-soft-magenta',
				),
				array(
					'name'     => __( 'Light red to very light pink', 'aino' ),
					'gradient' => 'linear-gradient( 90deg, rgb(255, 131, 92) 0%, rgb(255, 148, 193) 100%)',
					'slug'     => 'light-red-to-very-light-pink',
				),
				array(
					'name'     => __( 'Very soft violet to very soft pink', 'aino' ),
					'gradient' => 'linear-gradient( 90deg, rgb(198, 163, 245) 0%, rgb(248, 162, 199) 100%)',
					'slug'     => 'very-soft-violet-to-very-soft-pink',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for experimental link colour in blocks.
		add_theme_support('experimental-link-color');

		// Remove core block patterns, since Aino ships its own patterns via the Aino blocks plugin.
		remove_theme_support( 'core-block-patterns' );

		// Add support for custom custom line-heights in blocks.
		add_theme_support( 'custom-line-height' );

		// Add support for custom units in blocks.
		add_theme_support( 'custom-units' );

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
	if ( is_page_template( 'page-templates/tpl-fullscreen.php' ) || is_page_template( 'page-templates/tpl-hero.php' ) ) {
		$GLOBALS['content_width'] = apply_filters( 'aino_content_width', 2010 );
	} else {
		$GLOBALS['content_width'] = apply_filters( 'aino_content_width', 696 );
	}
	// phpcs:enable
}
add_action( 'after_setup_theme', 'aino_content_width', 0 );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string $html
 */
function aino_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;
}

add_filter( 'get_custom_logo', 'aino_get_custom_logo' );

/**
 * Register custom fonts.
 */
function aino_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by IBM Plex Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$ibm_plex_sans = esc_html_x( 'on', 'IBM Plex Sans font: on or off', 'aino' );

	if ( 'off' !== $ibm_plex_sans ) {
		$font_families = array();

		if ( 'off' !== $ibm_plex_sans ) {
			$font_families[] = 'IBM+Plex+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function aino_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#site-content">' . esc_html__( 'Skip to the content', 'aino' ) . '</a>';
}

add_action( 'wp_body_open', 'aino_skip_link', 5 );

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
	wp_enqueue_style( 'aino-style', get_template_directory_uri() . '/style.min.css', false, wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'aino-custom', get_theme_file_uri( '/assets/js/index.js' ), array(), wp_get_theme()->get( 'Version' ), true );

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
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'aino_skip_link_focus_fix' );

/**
 * Load more button.
 */
function aino_load_more_scripts() {
 
	global $wp_query;
 
	// register our main script but do not enqueue it yet
	wp_enqueue_script('jquery');
	wp_register_script( 'aino_loadmore', get_theme_file_uri( '/assets/js/loadmore.js' ), array(), wp_get_theme()->get( 'Version' ), true );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'aino_loadmore', 'aino_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );

	wp_enqueue_script( 'aino_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'aino_load_more_scripts' );

/**
 * Load more ajax handler.
 */
function aino_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();

			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'template-parts/post/content', get_post_format() );
			// for the test purposes comment the line above and uncomment the below one
			// the_title();

		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'aino_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'aino_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

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
 * @param  mixed $morevalue for custom excerpt ending.
 * @return void
 */
function aino_excerpt_more( $more ) {
	if ( is_admin() ) return $more;
	return '&hellip;';
}
add_filter( 'excerpt_more', 'aino_excerpt_more' );

/**
 * Creates a custom Archive title.
 *
 * @param  mixed $title
 * @return void
 */
function aino_archive_title ( $title ) {
	if ( is_author() ) {
		$title = '<span>' . esc_html__( 'All posts by', 'aino' ) . '</span>'; }
	if ( is_category() ) {
		$title = '<span>' . esc_html__( 'Filed under', 'aino' ) . '</span>' . single_cat_title( '', false ); }
	if ( is_tag() ) {
		$title = '<span>' . esc_html__( 'Filed under', 'aino' ) . '</span>' . single_tag_title( '', false ); }
	return $title;
}
add_filter( 'get_the_archive_title', 'aino_archive_title' );

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
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/defaults.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-css.php';
require get_template_directory() . '/inc/customizer/customizer-editor.php';
require get_template_directory() . '/inc/customizer/sanitization-callbacks.php';

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
  * Load Jetpack compatibility file.
*/
require get_template_directory() . '/inc/jetpack.php';

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
			'name'      => 'Aino Blocks - Creative Gutenberg Blocks',
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
