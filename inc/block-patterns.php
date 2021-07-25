<?php
/**
 * Aino Foundation Patterns
 *
 * @package Aino
 */

if ( ! function_exists( 'aino_register_block_patterns' ) ) :

	function aino_register_block_patterns() {

		if ( function_exists( 'register_block_pattern_category' ) ) {
			register_block_pattern_category(
				'aino-team',
				array( 'label' => __( 'Aino Team', 'aino' ) )
			);
		}

		if ( function_exists( 'register_block_pattern' ) ) {
			$block_patterns = array(
				'team-four-img-light',
				'team-four-img-dark',
				'team-three-img-light',
				'team-three-img-dark',
				'team-two-img-light',
				'team-two-img-dark',
				'team-one-img-small-light',
				'team-one-img-small-dark',
				'team-one-img-large-light',
				'team-one-img-large-dark',
			);

			if ( class_exists( 'WP_Block_Type_Registry' ) ) {
				$block_patterns[] = 'team-four-img-light';
				$block_patterns[] = 'team-four-img-dark';
				$block_patterns[] = 'team-three-img-light';
				$block_patterns[] = 'team-three-img-dark';
				$block_patterns[] = 'team-two-img-light';
				$block_patterns[] = 'team-two-img-dark';
				$block_patterns[] = 'team-one-img-small-light';
				$block_patterns[] = 'team-one-img-small-dark';
				$block_patterns[] = 'team-one-img-large-light';
				$block_patterns[] = 'team-one-img-large-dark';
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
