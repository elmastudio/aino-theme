<?php
/**
 * Aino Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package Aino
 */

if ( function_exists( 'register_block_style' ) ) {

	function aino_register_block_styles() {

		// Query three column list
		register_block_style(
			'core/query',
			array(
				'name'  => 'aino-3col-list',
				'label' => esc_html__( '3 Column List', 'aino' ),
			)
		);

		// Image with light border
		register_block_style(
			'core/image',
			array(
				'name'  => 'aino-border-light',
				'label' => esc_html__( 'Border Light', 'aino' ),
			)
		);

		// Image with dark border
		register_block_style(
			'core/image',
			array(
				'name'  => 'aino-border-dark',
				'label' => esc_html__( 'Border Dark', 'aino' ),
			)
		);

		// Tagcloud as buttons
		register_block_style(
			'core/tag-cloud',
			array(
				'name'  => 'aino-tags-btns',
				'label' => esc_html__( 'Tagcloud with buttons', 'aino' ),
			)
		);

		// Categories as buttons
		register_block_style(
			'core/categories',
			array(
				'name'  => 'aino-cats-btns',
				'label' => esc_html__( 'Categories as buttons', 'aino' ),
			)
		);
	}
	add_action( 'init', 'aino_register_block_styles' );
}
