<?php
/**
 * Aino Theme : Building Block Patterns
 *
 * @package Aino
 * @since   1.5.0
 */
if ( ! function_exists( 'aino_register_block_patterns' ) ) :

	function aino_register_block_patterns() {

		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'aino-abouts',
				array( 'label' => __( 'Aino Abouts', 'aino' ) )
			);
		}

		if ( function_exists( 'register_block_pattern' ) ) {
			$block_patterns = array(
				'about-three-columns',
			);

			if ( class_exists( 'WP_Block_Type_Registry' ) ) {
				$block_patterns[] = 'about-three-columns';
			}

			foreach ( $block_patterns as $block_pattern ) {
				register_block_pattern(
					'aino/' . $block_pattern,
					require __DIR__ . '/patterns/' . $block_pattern . '.php'
				);
			}
		}
	}
endif;

add_action( 'init', 'aino_register_block_patterns', 9 );
