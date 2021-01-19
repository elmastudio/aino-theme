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
				'primary_one_color'        => '#4D2CF0',
				'text_one_color'           => '#111111',
				'text_two_color'           => '#222222',
				'btn_text_color'           => '#ffffff',
				'footer_bg_color'          => '#ffffff',
				'footer_border_color'      => '#111111',
				'blogcards_bg_color'       => '#ffffff',
				'blogcards_bg_hover_color' => '#ffffff',

				// Styling.
				'heading_fontweight'       => 'regular',
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
				'footer_bordertop'         => true,
				'footer_borderbottom'      => true,
				'header_menu_bold'         => false,
				'header_menu_uppercase'    => false,
				'buttons_bold'             => false,
				'buttons_uppercase'        => false,
				'sticky_light'             => false,
				'blogcards_padding'        => true,

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
				'blogcards_author'         => false,
				'display_single_author'    => true,
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
