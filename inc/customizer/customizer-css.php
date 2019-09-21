<?php
/**
 * Aino: Custom CSS
 *
 * @package Aino
 * @since Aino 0.0.1
 */

/**
 * Set the Custom CSS via Customizer options.
 */
function aino_customizer_css() {

	$main_bg_color               = get_theme_mod( 'main_bg_color', aino_defaults( 'main_bg_color' ) );
	$primary_one_color           = get_theme_mod( 'primary_one_color', aino_defaults( 'primary_one_color' ) );
	$primary_one_color_rgba_10   = aino_hex2rgb( $primary_one_color );
	$primary_one_color_rgba_10   = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $primary_one_color_rgba_10 );
	$primary_one_color_rgba_20   = aino_hex2rgb( $primary_one_color );
	$primary_one_color_rgba_20   = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.2)', $primary_one_color_rgba_20 );
	$primary_one_color_rgba_35   = aino_hex2rgb( $primary_one_color );
	$primary_one_color_rgba_35   = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.35)', $primary_one_color_rgba_35 );
	$primary_two_color           = get_theme_mod( 'primary_two_color', aino_defaults( 'primary_two_color' ) );
	$secondary_one_color         = get_theme_mod( 'secondary_one_color', aino_defaults( 'secondary_one_color' ) );
	$secondary_one_color_rgba_10 = aino_hex2rgb( $secondary_one_color );
	$secondary_one_color_rgba_10 = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $secondary_one_color_rgba_10 );
	$background_color            = get_theme_mod( 'background_color', aino_defaults( 'background_color' ) );
	$blogcards_bg_color          = get_theme_mod( 'blogcards_bg_color', aino_defaults( 'blogcards_bg_color' ) );
	$blogcards_bg_color_hover    = get_theme_mod( 'blogcards_bg_color_hover', aino_defaults( 'blogcards_bg_color_hover' ) );
	$footer_bg_color             = get_theme_mod( 'footer_bg_color', aino_defaults( 'footer_bg_color' ) );
	$icon_color_one              = get_theme_mod( 'icon_color_one', aino_defaults( 'icon_color_one' ) );
	$icon_color_two              = get_theme_mod( 'icon_color_two', aino_defaults( 'icon_color_two' ) );
	$comments_border_color       = get_theme_mod( 'comments_border_color', aino_defaults( 'comments_border_color' ) );
	$comments_bg_color           = get_theme_mod( 'comments_bg_color', aino_defaults( 'comments_bg_color' ) );

	$css =
	'
	body {
		background-color: ' . esc_attr( $main_bg_color ) . ';
	}
	.entry-link {
		background-color: ' . esc_attr( $blogcards_bg_color ) . ';
	}
	.entry-link:hover {
		background-color: ' . esc_attr( $blogcards_bg_color_hover ) . ';
	}
	.entry-content p a,
	.entry-content li a,
	.comment-content p a,
	.comment-content li a,
	.btn-outline a,
	a.btn-outline,
	.pagination .current,
	.entry-tags a:hover {
		border-color: ' . esc_attr( $primary_one_color ) . ';
	}
	input[type="text"]:focus, input[type="email"]:focus,
	input[type="url"]:focus, input[type="password"]:focus,
	input[type="search"]:focus, input[type="number"]:focus,
	input[type="tel"]:focus, input[type="range"]:focus,
	input[type="date"]:focus, input[type="month"]:focus,
	input[type="week"]:focus, input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus, textarea:focus,
	input[type="text"]:active, input[type="email"]:active,
	input[type="url"]:active, input[type="password"]:active,
	input[type="search"]:active, input[type="number"]:active,
	input[type="tel"]:active, input[type="range"]:active,
	input[type="date"]:active, input[type="month"]:active,
	input[type="week"]:active, input[type="time"]:active,
	input[type="datetime"]:active,
	input[type="datetime-local"]:active,
	input[type="color"]:active, textarea:active {
		box-shadow: 0 0 0 3px ' . esc_attr( $primary_one_color ) . ';
	}
	.widget_mc4wp_form_widget input[type="submit"],
	.btn-primary a,
	a.btn-primary,
	input[type="submit"],
	.comment-respond input[type="submit"],
	.widget_mc4wp_form_widget .subscribe-btn,
	.widget_search .search-submit,
	.entry-content .search-submit,
	.entry-content .has-primary-link-background-color,
	.post-edit-link,
	.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background) {
		background-color: ' . esc_attr( $primary_one_color ) . ';
	}
	.entry-content p a:hover,
	.entry-content li a:hover,
	.authorbox-content p a:hover,
	.comment-content li a:hover,
	.comment-content p a:hover,
	.wp-caption-text a:hover,
	figcaption a:hover,
	cite a:hover,
	h1 a:hover,
	h2 a:hover,
	h3 a:hover,
	h4 a:hover,
	h5 a:hover,
	h6 a:hover,
	.site-title a:hover,
	.single-post .byline a:hover,
	.btn-outline a,
	a.btn-outline,
	.btn-outline a:hover,
	a.btn-outline:hover,
	.btn-naked:hover,
	.btn-naked a:hover,
	.entry-content .has-primary-one-color,
	.entry-tags a:hover,
	.main-navigation li.focus > a .icon,
	.main-navigation li:hover > a .icon,
	.main-navigation .sub-menu .menu-item-has-children.focus > a .icon,
	.main-navigation .sub-menu .menu-item-has-children:hover > a .icon,
	.wp-block-pullquote.is-style-default .has-text-color a:hover,
	.comment-author .author-badge {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}
	@media (min-width: 75.000em) {
		.main-navigation li a:hover,
		.main-navigation li:focus > a,
		.main-navigation li:hover > a,
		.main-navigation ul ul li:focus > a,
		.main-navigation ul ul li:hover > a,
		.main-navigation ul ul a:hover,
		.main-navigation ul ul.sub-menu a:hover,
		.footer-widget-wrap a:hover,
		.wp-block-quote .has-text-color a:hover,
		.wp-block-pullquote .has-text-color a:hover {
			color: ' . esc_attr( $primary_one_color ) . ';
			fill: ' . esc_attr( $primary_one_color ) . ';
		}
	}
	.entry-content p a:hover,
	.entry-content li a:hover,
	.authorbox-content p a:hover,
	.comment-content li a:hover,
	.comment-content p a:hover,
	.wp-caption-text a:hover,
	figcaption a:hover,
	cite a:hover {
		color: ' . esc_attr( $primary_one_color ) . ';
		box-shadow: inset 0 -0.06em 0 ' . esc_attr( $primary_one_color ) . ';
		box-shadow: inset 0 -0.07em 0 ' . esc_attr( $primary_one_color ) . ';
	}
	.btn-primary a:hover,
	a.btn-primary:hover,
	input[type="submit"]:hover,
	.widget_mc4wp_form_widget input[type="submit"]:hover,
	.widget_mc4wp_form_widget .subscribe-btn:hover,
	.comment-respond input[type="submit"]:hover,
	.widget_search .search-submit:hover,
	.entry-content .search-submit:hover {
		background-color: ' . esc_attr( $primary_two_color ) . ';
		fill: ' . esc_attr( $primary_two_color ) . ';
	}
	.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background):hover {
		background-color: ' . esc_attr( $primary_two_color ) . ';
	}
	a.btn-outline:hover,
	.btn-outline a:hover {
		border-color: ' . esc_attr( $primary_one_color ) . ';
		background-color: ' . esc_attr( $primary_one_color_rgba_10 ) . ';
	}
	.comment-author .author-badge {
		background-color: ' . esc_attr( $primary_one_color_rgba_20 ) . ';
	}
	.site-footer {
		background-color: ' . esc_attr( $footer_bg_color ) . ';
	}
	.entry-cats a {
		color: ' . esc_attr( $secondary_one_color ) . ';
	}
	.badge-highlight,
	.entry-cats a:hover,
	.bypostauthor .comment-author .author-badge {
		background-color: ' . esc_attr( $secondary_one_color ) . ';
	}
	.entry-cats a {
		background-color: ' . esc_attr( $secondary_one_color_rgba_10 ) . ';
	}
	.menu-social-container .icon {
		fill: ' . esc_attr( $icon_color_one ) . ';
	}
	.menu-social-container ul li a:hover .icon {
		fill: ' . esc_attr( $icon_color_two ) . ';
	}
	.comment-content-wrap {
		border-color: ' . esc_attr( $comments_border_color ) . ';
		background-color: ' . esc_attr( $comments_bg_color ) . ';
	}
	';

	wp_add_inline_style( 'aino-style', wp_strip_all_tags( $css ) );
}

add_action( 'wp_enqueue_scripts', 'aino_customizer_css' );
