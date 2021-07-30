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

		// Query Loop three column list
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
	}
	add_action( 'init', 'aino_register_block_styles' );
}
