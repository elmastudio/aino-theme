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
				'aino-header',
				array( 'label' => __( 'Aino Header', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-header',
				array( 'label' => __( 'Aino Footer', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-hero',
				array( 'label' => __( 'Aino Hero', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-feature',
				array( 'label' => __( 'Aino Feature', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-team',
				array( 'label' => __( 'Aino Team', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-services',
				array( 'label' => __( 'Aino Service', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-facts',
				array( 'label' => __( 'Aino Facts', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-contact',
				array( 'label' => __( 'Aino Contact', 'aino' ) )
			);
		}

		if ( function_exists( 'register_block_pattern' ) ) {
			$block_patterns = array(
				'team-four-img-light',
				'team-four-img-dark',
				'team-three-img-light',
				'team-three-img-dark',
				'team-three-img-list-light',
				'team-three-img-list-dark',
				'team-two-img-light',
				'team-two-img-dark',
				'team-one-img-small-light',
				'team-one-img-small-dark',
				'team-one-img-large-light',
				'team-one-img-large-dark',
				'hero-big-img-below-light',
			);

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
