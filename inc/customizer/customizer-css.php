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
	$text_one_color           = get_theme_mod( 'text_one_color', aino_defaults( 'text_one_color' ) );
	$text_two_color           = get_theme_mod( 'text_two_color', aino_defaults( 'text_two_color' ) );
	$btn_text_color           = get_theme_mod( 'btn_text_color', aino_defaults( 'btn_text_color' ) );
	$background_color         = get_theme_mod( 'background_color', aino_defaults( 'background_color' ) );
	$blogcards_bg_color       = get_theme_mod( 'blogcards_bg_color', aino_defaults( 'blogcards_bg_color' ) );
	$blogcards_bg_color_hover = get_theme_mod( 'blogcards_bg_color_hover', aino_defaults( 'blogcards_bg_color_hover' ) );
	$footer_bg_color          = get_theme_mod( 'footer_bg_color', aino_defaults( 'footer_bg_color' ) );
	$footer_border_color      = get_theme_mod( 'footer_border_color', aino_defaults( 'footer_border_color' ) );

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
	.pagination .current {
		border-color: ' . esc_attr( $primary_one_color ) . ';
	}
	.btn-outline a,
	a.btn-outline {
		box-shadow: inset 0px 0px 0px 1px ' . esc_attr( $primary_one_color ) . ';
	}
	.buttons-bold .btn-outline a,
	.buttons-bold a.btn-outline {
		box-shadow: inset 0px 0px 0px 2px ' . esc_attr( $primary_one_color ) . ';
	}
	.entry-content .has-primary-one-background-color,
	.widget_mc4wp_form_widget input[type="submit"],
	.btn-primary a,
	a.btn-primary,
	input[type="submit"],
	.comment-respond input[type="submit"],
	.widget_mc4wp_form_widget .subscribe-btn,
	.widget_search .search-submit,
	.entry-content .search-submit,
	.entry-content .has-primary-link-background-color,
	.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background) {
		background-color: ' . esc_attr( $primary_one_color ) . ';
	}
	.entry-content p a:hover,
	.entry-content li a:hover,
	.authorbox__content p a:hover,
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
	.btn-outline a,
	a.btn-outline,
	.btn-outline a:hover,
	a.btn-outline:hover,
	.btn-naked:hover,
	.btn-naked a:hover,
	.entry-content .has-primary-one-color,
	.wp-block-pullquote.is-style-default .has-text-color a:hover,
	.comment-author .author-badge,
	.modal-menu a:focus,
	.modal-menu a:hover,
	.modal-menu li.current-menu-item > .ancestor-wrapper > a,
	.modal-menu li.current_page_ancestor > .ancestor-wrapper > a,
	button.sub-menu-toggle:hover,
	button.sub-menu-toggle:focus,
	.wp-block-image figcaption a:hover,
	.site-footer .footer-wrap .footer-info .site-info a:hover,
	.site-footer a.back-top:hover {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}
	@media (min-width: 75.000em) {
		.footer-widget-wrap a:hover,
		.wp-block-quote .has-text-color a:hover,
		.wp-block-pullquote .has-text-color a:hover {
			color: ' . esc_attr( $primary_one_color ) . ';
			fill: ' . esc_attr( $primary_one_color ) . ';
		}
	}
	.entry-content li a:hover,
	.authorbox__content p a:hover,
	.comment-content li a:hover,
	.comment-content p a:hover,
	.comment-reply-title #cancel-comment-reply-link:hover,
	.logged-in-as a:hover,
	.wp-caption-text a:hover,
	figcaption a:hover,
	cite a:hover,
	.related-post .entry-cats a:hover,
	.author-meta-info a:hover {
		color: ' . esc_attr( $primary_one_color ) . ';
	}
	a.btn-outline:hover,
	.btn-outline a:hover {
		border-color: ' . esc_attr( $primary_one_color ) . ';
	}
	button, input[type="button"], input[type="submit"], .btn-primary a, a.btn-primary {
		color: ' . esc_attr( $btn_text_color ) . ';
		fill: ' . esc_attr( $btn_text_color ) . ';
	}
	.site-footer {
		background-color: ' . esc_attr( $footer_bg_color ) . ';
	}

	.site-footer .footer-wrap .footer-info {
		border-top: 1px solid ' . esc_attr( $footer_border_color ) . ';
	}
	.site-footer .footer-widget-wrap:before {
		background-color: ' . esc_attr( $footer_border_color ) . ';
	}
	';

	wp_add_inline_style( 'aino-style', wp_strip_all_tags( $css ) );
}

add_action( 'wp_enqueue_scripts', 'aino_customizer_css' );
