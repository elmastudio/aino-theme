<?php
/**
 * Aino: Custom CSS for the editor.
 *
 * @package Aino
 * @since Aino 0.0.1
 */

/**
 * Add customizer colors to the block editor.
 */
function aino_editor_customizer_generated_values() {

	// Retrieve colors from the Customizer.
	$main_bg_color             = get_theme_mod( 'main_bg_color', aino_defaults( 'main_bg_color' ) );
	$primary_one_color         = get_theme_mod( 'primary_one_color', aino_defaults( 'primary_one_color' ) );
	$blogcards_bg_color        = get_theme_mod( 'blogcards_bg_color', aino_defaults( 'blogcards_bg_color' ) );
	$blogcards_bg_color_hover  = get_theme_mod( 'blogcards_bg_color_hover', aino_defaults( 'blogcards_bg_color_hover' ) );
	$footer_bg_color           = get_theme_mod( 'footer_bg_color', aino_defaults( 'footer_bg_color' ) );
	$comments_bg_color         = get_theme_mod( 'comments_bg_color', aino_defaults( 'comments_bg_color' ) );

	// Build styles.
	$css = '
	.editor-block-list__layout .editor-block-list__block a:hover,
	.editor-block-list__layout .editor-block-list__block a:active,
	.editor-block-list__layout .editor-block-list__block .wp-block-heading a:hover,
	.editor-block-list__layout .editor-block-list__block .wp-block-image figcaption a:hover {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}

	.editor-block-list__layout .editor-block-list__block a:hover {
		box-shadow: inset 0 -0.06em 0 ' . esc_attr( $primary_one_color ) . ';
		box-shadow: inset 0 -0.07em 0 ' . esc_attr( $primary_one_color ) . ';
	}

	';

	return wp_strip_all_tags( apply_filters( 'aino_editor_customizer_generated_values', $css ) );
}

/**
 * Enqueue Customizer settings into the block editor.
 */
function aino_editor_customizer_styles() {

	// Register Customizer styles within the editor to use for inline additions.
	wp_register_style( 'aino-editor-customizer-styles', false, '0.0.1', 'all' );

	// Enqueue the Customizer style.
	wp_enqueue_style( 'aino-editor-customizer-styles' );

	// Add custom colors to the editor.
	wp_add_inline_style( 'aino-editor-customizer-styles', aino_editor_customizer_generated_values() );
}
add_action( 'enqueue_block_editor_assets', 'aino_editor_customizer_styles' );
