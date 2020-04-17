<?php
/**
 * Customizer default settings.
 *
 * @package Aino
 */

/**
 * Get the default Customizer settings.
 *
 * @param  string|string $name Option key name to get.
 * @return mixin
 */
function aino_defaults( $name ) {
	static $defaults;

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'aino_defaults',
			array(

				// Colors.
				'main_bg_color'            => '#ffffff',
				'primary_one_color'        => '#1765d8',
				'text_one_color'           => '#111111',
				'text_two_color'           => '#222222',
				'btn_text_color'           => '#ffffff',
				'footer_bg_color'          => '#f7f7ff',
				'highlight_color'          => '#1cceb2',
				'comments_bg_color'        => '#f7f7ff',
				'blogcards_bg_color'       => '#ffffff',
				'blogcards_bg_hover_color' => '#ffffff',

				// Styling.
				'heading_fontweight'       => 'bold',
				'button_style'             => 'squared',
				'form_style'               => 'squared',
				'featuredimg_style'        => 'radius-none',
				'blog_columns'             => 'twocolumn',
				'blogcards_shadow'         => 'shadow-a',
				'blogcards_shadow_hover'   => 'shadow-b',
				'blogcards_borderradius'   => 'radius-none',
				'blogcards_animation'      => 'blogcards-movein',
				'post_excerpt_lengths'     => '15',
				'footer_light'             => false,
				'footerwidget_alignment'   => true,
				'footerinfo_alignment'     => true,
				'comments_border'          => false,
				'header_menu_bold'         => false,
				'header_menu_uppercase'    => false,
				'buttons_bold'             => false,
				'buttons_uppercase'        => false,

				// Custom Content.
				'blog_title'               => '',
				'blog_title_description'   => '',
				'footer_siteinfo'          => '',

				// Visibility.
				'disable_googlefonts'      => false,
				'sitedescription'          => true,
				'retina_logo'              => false,
				'header_search'            => false,
				'aino_displaydate'         => true,
				'display_comments'         => false,
				'aino_displayauthor'       => true,
				'blogcards_authororcats'   => false,
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
