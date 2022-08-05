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
		'heroes'     => array( 'label' => __( 'Heroes', 'aino' ) ),
		'features'   => array( 'label' => __( 'Features', 'aino' ) ),
		'teams'      => array( 'label' => __( 'Teams', 'aino' ) ),
		'portfolios' => array( 'label' => __( 'Portfolios', 'aino' ) ),
		'texts'      => array( 'label' => __( 'Texts', 'aino' ) ),
		'contacts'   => array( 'label' => __( 'Contacts', 'aino' ) ),
		'posts'      => array( 'label' => __( 'Posts', 'aino' ) ),
		'banners'    => array( 'label' => __( 'Banners', 'aino' ) ),
		'headers'    => array( 'label' => __( 'Headers', 'aino' ) ),
		'footers'    => array( 'label' => __( 'Footers', 'aino' ) ),
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
		'free/heroes/hero-text-img-below-light',
		'free/heroes/hero-text-img-below-dark',
		'free/features/feature-heading-two-text-img-dark',
		'free/features/feature-heading-two-text-img-light',
		'free/features/feature-text-right-img-left-dark',
		'free/features/feature-text-right-img-left-light',
		'free/features/feature-text-left-img-right-dark',
		'free/features/feature-text-left-img-right-light',
		'free/teams/team-four-img-light',
		'free/teams/team-four-img-dark',
		'free/teams/team-three-img-light',
		'free/teams/team-three-img-dark',
		'free/teams/team-three-img-list-light',
		'free/teams/team-three-img-list-dark',
		'free/teams/team-two-img-light',
		'free/teams/team-two-img-dark',
		'free/teams/team-one-img-small-light',
		'free/teams/team-one-img-small-dark',
		'free/teams/team-one-img-large-light',
		'free/teams/team-one-img-large-dark',
		'free/portfolios/portfolio-four-img-dark',
		'free/portfolios/portfolio-four-img-light',
		'free/texts/text-heading-centered-dark',
		'free/texts/text-heading-centered-light',
		'free/texts/text-big-heading-left-text-right-dark',
		'free/texts/text-big-heading-left-text-right-light',
		'free/texts/text-centered-paragraph-dark',
		'free/texts/text-centered-paragraph-light',
		'free/texts/text-small-heading-left-text-right-dark',
		'free/texts/text-small-heading-left-text-right-light',
		'free/texts/text-big-headline-two-col-text-dark',
		'free/texts/text-big-headline-two-col-text-light',
		'free/texts/text-five-col-text-dark',
		'free/texts/text-five-col-text-light',
		'free/contacts/contact-big-heading-three-col-light',
		'free/contacts/contact-big-heading-three-col-dark',
		'free/posts/posts-three-col-light',
		'free/posts/posts-three-col-dark',
		'free/banners/banner-default-light',
		'free/banners/banner-default-dark',
		'free/banners/banner-wide-light',
		'free/banners/banner-wide-dark',
		'free/headers/header-default',
		'free/headers/header-dark',
		'free/footers/footer-default',
		'free/footers/footer-dark',
		'free/footers/footer-five-col-logo-light',
		'free/footers/footer-five-col-logo-dark',
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
