<?php
/**
 * Customizer default settings.
 *
 * @package Aino
 */

/**
 * Get the default Customizer settings.
 *
 * @param  string|string $name Option key name to get.
 * @return mixin
 */
function aino_defaults( $name ) {
	static $defaults;

	if ( ! $defaults ) {
		$defaults = apply_filters(
			'aino_defaults',
			array(

				// Styling.
				'button_style'        => 'squared',
				'form_style'          => 'squared',
				'disable_googlefonts' => false,
			)
		);
	}

	return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
