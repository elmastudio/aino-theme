<?php
/**
 * 404 content.
 */

return array(
	'title'    => __( '404 content', 'aino' ),
	'inserter' => false,
	'content'  => '<!-- wp:heading {"className":"has-text-align-center pb__6 has-font-primary-color has-text-color has-text-xxxl-font-size"} --><h2 class="has-text-align-center pb__6 has-font-primary-color has-text-color has-text-xxxl-font-size">' . esc_html( _x( '404 Error', 'Error code for a webpage that is not found.', 'aino' ) ) . '</h2><!-- /wp:heading -->
	<!-- wp:paragraph {"textColor":"font-secondary","textAlign":"center","fontSize":"text-m","paddingBottom":9} -->
	<p class="has-text-align-center has-font-secondary-color pb__9 has-text-color has-text-m-font-size">' . esc_html__( 'Sorry, we can’t seem to find what you’re looking for. You\'ve landed on a URL that doesn\'t seem to exist. Maybe try a search?', 'aino' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:search {"label":"","buttonText":"Search"} /-->',
);