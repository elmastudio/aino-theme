<?php
/**
 * Aino: Custom CSS for the editor.
 *
 * @package Aino
 */

/**
 * Add customizer colors to the block editor.
 */
function aino_editor_customizer_generated_values() {

	// Retrieve colors from the Customizer.
	$main_bg_color      = get_theme_mod( 'main_bg_color', aino_defaults( 'main_bg_color' ) );
	$primary_one_color  = get_theme_mod( 'primary_one_color', aino_defaults( 'primary_one_color' ) );
	$btn_text_color     = get_theme_mod( 'btn_text_color', aino_defaults( 'btn_text_color' ) );

	// Heading font weight.
	$heading_fontweight = get_theme_mod( 'heading_fontweight', aino_defaults( 'heading_fontweight' ) );

	// Build styles.
	$css = '
	.editor-styles-wrapper {
		background-color: ' . esc_attr( $main_bg_color ) . ';
	}

	.block-editor .editor-styles-wrapper .has-primary-one-background-color {
		background-color: ' . esc_attr( $primary_one_color ) . ';
	}

	.block-editor .editor-styles-wrapper .has-primary-one-color {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}

	.block-editor .editor-styles-wrapper .editor-post-title .editor-post-title__input,
	.block-editor .editor-styles-wrapper h2,
	.block-editor .editor-styles-wrapper h3,
	.block-editor .editor-styles-wrapper h4,
	.block-editor .editor-styles-wrapper h5,
	.block-editor .editor-styles-wrapper h6 {
		font-weight: ' . esc_attr( $heading_fontweight ) . ';
	}

	.editor-styles-wrapper p a:hover,
	.editor-styles-wrapper blockquote:not(.has-text-color) .wp-block-pullquote__citation a:hover,
	.wp-block-pullquote__citation a:hover,
	.editor-styles-wrapper .wp-block-ainoblocks-button.is-style-outline .wp-block-ainoblocks-button__link,
	.editor-styles-wrapper .wp-block-ainoblocks-button.is-style-ghost .wp-block-ainoblocks-button__link,
	.editor-styles-wrapper .wp-block-ainoblocks-button.is-style-3doutline .wp-block-ainoblocks-button__link {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}

	.editor-styles-wrapper .wp-block-button .wp-block-button__link,
	.editor-styles-wrapper .wp-block-ainoblocks-button .wp-block-ainoblocks-button__link {
		background-color: ' . esc_attr( $primary_one_color ) . ';
		color: ' . esc_attr( $btn_text_color ) . ';
	}

	.editor-styles-wrapper .wp-block-ainoblocks-button.is-style-outline .wp-block-ainoblocks-button__link,
	.editor-styles-wrapper .wp-block-ainoblocks-button.is-style-3doutline .wp-block-ainoblocks-button__link:before,
	.editor-styles-wrapper .wp-block-ainoblocks-button.is-style-3doutline .wp-block-ainoblocks-button__link:after {
		box-shadow: inset 0 0 0 1px ' . esc_attr( $primary_one_color ) . ';
	}

	.editor-styles-wrapper .wp-block-button:not(.has-text-color):not(.is-style-outline) [data-rich-text-placeholder]:after {
		color: ' . esc_attr( $btn_text_color ) . ';
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
