<?php
/**
 * Aino: Block Patterns
 *
 * @since Aino 2.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Aino 2.0
 *
 * @return void
 */
function aino_register_block_patterns() {
	$block_pattern_categories = array(
		'hero'      => array( 'label' => __( 'Hero', 'aino' ) ),
		'featured'   => array( 'label' => __( 'Featured', 'aino' ) ),
		'team'      => array( 'label' => __( 'Team', 'aino' ) ),
		'portfolio' => array( 'label' => __( 'Portfolio', 'aino' ) ),
		'text'      => array( 'label' => __( 'Text', 'aino' ) ),
		'contact'   => array( 'label' => __( 'Contact', 'aino' ) ),
		'query'     => array( 'label' => __( 'Query', 'aino' ) ),
		'banner'    => array( 'label' => __( 'Banners', 'aino' ) ),
		'header'    => array( 'label' => __( 'Headers', 'aino' ) ),
		'footer'    => array( 'label' => __( 'Footers', 'aino' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Aino 2.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'aino_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'free/hero/hero-text-img-below-light',
		'free/hero/hero-text-img-below-dark',
		'free/featured/feature-heading-two-text-img-dark',
		'free/featured/feature-heading-two-text-img-light',
		'free/featured/feature-text-right-img-left-dark',
		'free/featured/feature-text-right-img-left-light',
		'free/featured/feature-text-left-img-right-dark',
		'free/featured/feature-text-left-img-right-light',
		'free/team/team-four-img-light',
		'free/team/team-four-img-dark',
		'free/team/team-three-img-light',
		'free/team/team-three-img-dark',
		'free/team/team-three-img-list-light',
		'free/team/team-three-img-list-dark',
		'free/team/team-two-img-light',
		'free/team/team-two-img-dark',
		'free/team/team-one-img-small-light',
		'free/team/team-one-img-small-dark',
		'free/team/team-one-img-large-light',
		'free/team/team-one-img-large-dark',
		'free/portfolio/portfolio-four-img-dark',
		'free/portfolio/portfolio-four-img-light',
		'free/text/text-heading-centered-dark',
		'free/text/text-heading-centered-light',
		'free/text/text-big-heading-left-text-right-dark',
		'free/text/text-big-heading-left-text-right-light',
		'free/text/text-centered-paragraph-dark',
		'free/text/text-centered-paragraph-light',
		'free/text/text-small-heading-left-text-right-dark',
		'free/text/text-small-heading-left-text-right-light',
		'free/text/text-big-headline-two-col-text-dark',
		'free/text/text-big-headline-two-col-text-light',
		'free/text/text-five-col-text-dark',
		'free/text/text-five-col-text-light',
		'free/contact/contact-big-heading-three-col-light',
		'free/contact/contact-big-heading-three-col-dark',
		'free/query/query-three-col-light',
		'free/query/query-three-col-dark',
		'free/banner/banner-default-light',
		'free/banner/banner-default-dark',
		'free/banner/banner-wide-light',
		'free/banner/banner-wide-dark',
		'free/header/header-default',
		'free/header/header-dark',
		'free/footer/footer-default',
		'free/footer/footer-dark',
		'free/footer/footer-five-col-logo-light',
		'free/footer/footer-five-col-logo-dark',
		'free/hidden/404',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Aino 2.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'aino_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'aino/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'aino_register_block_patterns', 9 );
