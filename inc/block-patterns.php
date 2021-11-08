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
				array( 'label' => __( 'Hero', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-feature',
				array( 'label' => __( 'Feature', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-team',
				array( 'label' => __( 'Team', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-portfolio',
				array( 'label' => __( 'Portfolio', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-text',
				array( 'label' => __( 'Text', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-contact',
				array( 'label' => __( 'Contact', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-query',
				array( 'label' => __( 'Query', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-banner',
				array( 'label' => __( 'Banner', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-header',
				array( 'label' => __( 'Header', 'aino' ) )
			);

			register_block_pattern_category(
				'aino-footer',
				array( 'label' => __( 'Footer', 'aino' ) )
			);
		}

		if ( function_exists( 'register_block_pattern' ) ) {
			$block_patterns = array(
				'free/hero-text-img-below-light',
				'free/hero-text-img-below-dark',
				'free/feature-grid-one-two-col-light',
				'free/feature-grid-one-two-col-dark',
				'free/feature-heading-two-text-img-dark',
				'free/feature-heading-two-text-img-light',
				'free/feature-text-right-img-left-dark',
				'free/feature-text-right-img-left-light',
				'free/feature-text-left-img-right-dark',
				'free/feature-text-left-img-right-light',
				'free/team-four-img-light',
				'free/team-four-img-dark',
				'free/team-three-img-light',
				'free/team-three-img-dark',
				'free/team-three-img-list-light',
				'free/team-three-img-list-dark',
				'free/team-two-img-light',
				'free/team-two-img-dark',
				'free/team-one-img-small-light',
				'free/team-one-img-small-dark',
				'free/team-one-img-large-light',
				'free/team-one-img-large-dark',
				'free/portfolio-four-img-dark',
				'free/portfolio-four-img-light',
				'free/text-heading-centered-dark',
				'free/text-heading-centered-light',
				'free/text-big-heading-left-text-right-dark',
				'free/text-big-heading-left-text-right-light',
				'free/text-centered-paragraph-dark',
				'free/text-centered-paragraph-light',
				'free/text-small-heading-left-text-right-dark',
				'free/text-small-heading-left-text-right-light',
				'free/text-big-headline-two-col-text-dark',
				'free/text-big-headline-two-col-text-light',
				'free/text-five-col-text-dark',
				'free/text-five-col-text-light',
				'free/contact-big-heading-three-col-light',
				'free/contact-big-heading-three-col-dark',
				'free/query-three-col-light',
				'free/query-three-col-dark',
				'free/banner-default-light',
				'free/banner-default-dark',
				'free/banner-wide-light',
				'free/banner-wide-dark',
				'free/header-centered-slim-light',
				'free/header-centered-slim-dark',
				'free/footer-five-col-sitelogo-light',
				'free/footer-five-col-sitelogo-dark',
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
