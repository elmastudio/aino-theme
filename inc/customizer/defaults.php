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
				'primary_one_color'        => '#616aff',
				'primary_two_color'        => '#4f45ff',
				'secondary_one_color'      => '#1cceb2',
				'footer_bg_color'          => '#f7f7ff',
				'highlight_color'          => '#1cceb2',
				'icon_color_one'           => '#212429;',
				'icon_color_two'           => '#616aff',
				'comments_border_color'    => '#f7f7ff',
				'comments_bg_color'        => '#f7f7ff',
				'blogcards_bg_color'       => '#ffffff',
				'blogcards_bg_hover_color' => '#ffffff',

				// Typography.
				'heading_fontweight'       => 'bold',

				// Styling.
				'button_style'             => 'smooth',
				'form_style'               => 'smooth',
				'featuredimg_style'        => 'radius-m',
				'blog_columns'             => 'threecolumn',
				'blogcards_shadow'         => 'shadow-a',
				'blogcards_shadow_hover'   => 'shadow-b',
				'blogcards_borderradius'   => 'radius-m',
				'blogcards_animation'      => 'blogcards-movein',
				'post_excerpt_lengths'     => '15',
				'footerwidget_alignment'   => true,
				'footerinfo_alignment'     => true,

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
