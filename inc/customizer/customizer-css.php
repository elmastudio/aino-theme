<?php
/**
 * Aino: Custom CSS
 *
 * @package Aino
 */

/**
 * Set the Custom CSS via Customizer options.
 */
function aino_customizer_css() {

	$main_bg_color            = get_theme_mod( 'main_bg_color', aino_defaults( 'main_bg_color' ) );
	$primary_one_color        = get_theme_mod( 'primary_one_color', aino_defaults( 'primary_one_color' ) );
	$btn_text_color           = get_theme_mod( 'btn_text_color', aino_defaults( 'btn_text_color' ) );
	$btn_bg_hover_color       = get_theme_mod( 'btn_bg_hover_color', aino_defaults( 'btn_bg_hover_color' ) );
	$text_one_color           = get_theme_mod( 'text_one_color', aino_defaults( 'text_one_color' ) );
	$text_two_color           = get_theme_mod( 'text_two_color', aino_defaults( 'text_two_color' ) );
	$background_color         = get_theme_mod( 'background_color', aino_defaults( 'background_color' ) );
	$blogcards_bg_color       = get_theme_mod( 'blogcards_bg_color', aino_defaults( 'blogcards_bg_color' ) );
	$blogcards_bg_color_hover = get_theme_mod( 'blogcards_bg_color_hover', aino_defaults( 'blogcards_bg_color_hover' ) );
	$footer_bg_color          = get_theme_mod( 'footer_bg_color', aino_defaults( 'footer_bg_color' ) );
	$footer_border_color      = get_theme_mod( 'footer_border_color', aino_defaults( 'footer_border_color' ) );

	$theme_css =
	'
	body, .menu-modal-inner, ul.primary-menu ul {
		background-color: ' . esc_attr( $main_bg_color ) . ';
	}
	.entry-link {
		background-color: ' . esc_attr( $blogcards_bg_color ) . ';
	}
	.entry-link:hover {
		background-color: ' . esc_attr( $blogcards_bg_color_hover ) . ';
	}
	.btn-outline a,
	a.btn-outline {
		border-color: ' . esc_attr( $primary_one_color ) . ';
	}
	.entry-content .has-primary-one-background-color,
	.widget_mc4wp_form_widget input[type="submit"],
	.btn-primary a,
	a.btn-primary,
	input[type="submit"],
	.loadmore,
	.comment-respond input[type="submit"],
	.widget_mc4wp_form_widget .subscribe-btn,
	.widget_search .search-submit,
	.entry-content .search-submit,
	.entry-content .has-primary-link-background-color,
	.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background),
	button,
	input[type="button"],
	input[type="submit"],
	.wc-block-components-button,
	.wc-block-components-button:not(.is-link) {
		background-color: ' . esc_attr( $primary_one_color ) . ';
	}
	.entry-content .has-primary-one-background-color:hover,
	.widget_mc4wp_form_widget input[type="submit"]:hover,
	.btn-primary a:hover,
	a.btn-primary:hover,
	input[type="submit"]:hover,
	.loadmore:hover,
	.comment-respond input[type="submit"]:hover,
	.widget_mc4wp_form_widget .subscribe-btn:hover,
	.widget_search .search-submit:hover,
	.entry-content .search-submit:hover,
	.entry-content .has-primary-link-background-color:hover,
	.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background):hover,
	button:hover,
	input[type="button"]:hover,
	input[type="submit"]:hover,
	.wc-block-components-button:hover,
	.wc-block-components-button:not(.is-link):active,
	.wc-block-components-button:not(.is-link):focus,
	.wc-block-components-button:not(.is-link):hover {
		background-color: ' . esc_attr( $btn_bg_hover_color ) . ';
	}
	.btn-outline a:hover,
	a.btn-outline:hover {
		color: ' . esc_attr( $btn_text_color ) . ';
		fill: ' . esc_attr( $btn_text_color ) . ';
		background-color: ' . esc_attr( $primary_one_color ) . ';
	}
	.btn-naked:hover,
	.btn-naked a:hover {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}
	button,
	input[type="button"],
	input[type="submit"],
	.btn-primary a,
	a.btn-primary {
		color: ' . esc_attr( $btn_text_color ) . ';
		fill: ' . esc_attr( $btn_text_color ) . ';
	}
	.site-footer .footer-wrap .footer-info {
		border-top: 1px solid ' . esc_attr( $footer_border_color ) . ';
	}
	.site-footer .footer-widget-wrap:before {
		background-color: ' . esc_attr( $footer_border_color ) . ';
	}
	.site-footer {
		background-color: ' . esc_attr( $footer_bg_color ) . ';
	}
	';

	wp_add_inline_style( 'aino-style', wp_strip_all_tags( $theme_css ) );
}

add_action( 'wp_enqueue_scripts', 'aino_customizer_css' );
