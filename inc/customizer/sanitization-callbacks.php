<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 *
 * @package Aino
 */

/**
 * Checkbox sanitization callback example.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function aino_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Sanitize Blog Layout
 *
 * @param string $choice defines the number of columns in the blog layout.
 *
 * @return string
 */
function aino_sanitize_blog_columns( $choice ) {
	$valid = array(
		'onecolumn',
		'twocolumn',
		'threecolumn',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'threecolumn';
}

/**
 * Sanitize Headline Font Weight
 *
 * @param string $choice Whether headings font has font-weight regular or bold.
 *
 * @return string
 */
function aino_sanitize_headline_font_weight( $choice ) {
	$valid = array(
		'regular',
		'bold',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'regular';
}

/**
 * Sanitize Shapes
 *
 * @param string $choice Whether elements have a sharp, smooth or round border-radius.
 *
 * @return string
 */
function aino_sanitize_shapes( $choice ) {
	$valid = array(
		'squared',
		'curved',
		'round',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'squared';
}

/**
 * Sanitize Alignment
 *
 * @param string $choice Whether elements are left, center or right aligned.
 *
 * @return string
 */
function aino_sanitize_align( $choice ) {
	$valid = array(
		'left',
		'center',
		'right',
		'spacebetween',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'center';
}

/**
 * Sanitize Numbers.
 *
 * @param integer              $number Check if number is a non-decimal number.
 * @param WP_Customize_Setting $setting Setting instance.
 *
 * @return integer
 */
function aino_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default.
	return ( $number ? $number : $setting->default );
}

/**
 * Sanitize Blog Cards Hover Animation
 *
 * @param string $choice Defines blog card hover animation.
 *
 * @return string
 */
function aino_sanitize_blogcards_animation( $choice ) {
	$valid = array(
		'cardhover_zoom',
		'cardhover_moveup',
		'cardhover_none',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'cardhover_zoom';
}

/**
 * Sanitize Border Radius
 *
 * @param string $choice Defines border radius.
 *
 * @return string
 */
function aino_sanitize_borderradius( $choice ) {
	$valid = array(
		'border-radius-none',
		'border-radius-xxs',
		'border-radius-xs',
		'border-radius-s',
		'border-radius-m',
		'border-radius-l',
		'border-radius-xl',
		'border-radius-xxl',
		'border-radius-xxxl',
		'border-radius-xxxxl',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'radius-none';
}

/**
 * Sanitize Shadows
 *
 * @param string $choice Defines the shadow options.
 *
 * @return string
 */
function aino_sanitize_shadow( $choice ) {
	$valid = array(
		'shadow-none',
		'shadow-a',
		'shadow-b',
		'shadow-c',
		'shadow-d',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'shadow-a';
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function aino_customize_preview_js() {
	wp_enqueue_script( 'aino_customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'aino_customize_preview_js' );
