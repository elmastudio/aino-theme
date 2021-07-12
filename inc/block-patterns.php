<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package Aino
 */

/**
 * Register Block Pattern Category.
 */
function aino_register_pattern_categories() {

	register_block_pattern_category(
		'aino-building-blocks',
		array( 'label' => __( 'Aino Building Block', 'aino' ) )
	);
}

add_action( 'init', 'aino_register_pattern_categories' );

/**
 * Register Block Patterns.
 */
function aino_register_patterns() {

	register_block_pattern(
		'aino/latest-posts',
		array(
			'title'       => __( 'Latest Posts', 'aino' ),
			'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'aino' ),
			'categories'  => array( 'aino-building-blocks' ),
			'content'     => '',
		)
	);
}

add_action( 'init', 'aino_register_patterns' );
