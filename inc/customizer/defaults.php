<?php
/**
 * Customizer default settings.
 *
 * @package Aino
 * @since Aino 0.0.1
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
				'footer_bg_color'          => '#f7f7ff',
				'highlight_color'          => '#1cceb2',
				'comments_bg_color'        => '#f7f7ff',
				'blogcards_bg_color'       => '#ffffff',
				'blogcards_bg_hover_color' => '#ffffff',

				// Typography.
				'heading_fontweight'       => 'bold',

				// Styling.
				'button_style'             => 'squared',
				'form_style'               => 'squared',
				'featuredimg_style'        => 'radius-m',
				'blog_columns'             => 'threecolumn',
				'blog_title'               => '',
				'blog_title_description'   => '',
				'blogcards_shadow'         => 'shadow-a',
				'blogcards_shadow_hover'   => 'shadow-b',
				'blogcards_borderradius'   => 'radius-m',
				'blogcards_animation'      => 'blogcards-movein',
				'post_excerpt_lengths'     => '15',
				'footer_light'             => false,
				'footerwidget_alignment'   => true,
				'footerinfo_alignment'     => true,
				'comments_border'          => false,

				// Visibility.
				'sitedescription'          => true,
				'retina_logo'              => false,
				'header_search'            => true,
				'aino_displaydate'         => true,
				'display_comments'         => false,
				'aino_displayauthor'       => true,
				'blogcards_authororcats'   => false,
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
