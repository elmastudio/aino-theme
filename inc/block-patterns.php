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
				'aino-portfolio',
				array( 'label' => __( 'Aino Portfolio', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-text',
				array( 'label' => __( 'Aino Text', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-contact',
				array( 'label' => __( 'Aino Contact', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-query',
				array( 'label' => __( 'Aino Query', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-header',
				array( 'label' => __( 'Aino Header', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-footer',
				array( 'label' => __( 'Aino Footer', 'aino' ) )
			);
		}

		if ( function_exists( 'register_block_pattern' ) ) {
			$block_patterns = array(
				'hero-text-img-below-light',
				'hero-text-img-below-dark',
				'feature-heading-two-text-img-dark',
				'feature-heading-two-text-img-light',
				'feature-text-right-img-left-dark',
				'feature-text-right-img-left-light',
				'feature-text-left-img-right-dark',
				'feature-text-left-img-right-light',
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
				'portfolio-four-img-dark',
				'portfolio-four-img-light',
				'text-heading-centered-dark',
				'text-heading-centered-light',
				'text-big-heading-left-text-right-dark',
				'text-big-heading-left-text-right-light',
				'text-centered-paragraph-dark',
				'text-centered-paragraph-light',
				'text-small-heading-left-text-right-dark',
				'text-small-heading-left-text-right-light',
				'text-big-headline-two-col-text-dark',
				'text-big-headline-two-col-text-light',
				'text-five-col-text-dark',
				'text-five-col-text-light',
				'contact-big-heading-three-col-light',
				'contact-big-heading-three-col-dark',
				'query-three-col-light',
				'query-three-col-dark',
				'header-centered-slim-light',
				'header-centered-slim-dark',
				'footer-five-col-sitelogo-light',
				'footer-five-col-sitelogo-dark',
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
