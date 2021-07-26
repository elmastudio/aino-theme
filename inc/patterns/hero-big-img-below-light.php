<?php
/**
 * Hero Intro at top with big image below (Light version)
 *
 * @package aino
 */

return array(
	'title'      => __( 'Heading, description and CTA button with big image below (Light).', 'aino' ),
	'categories' => array( 'aino-hero' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"color":{"background":"#f7c7c6"}},"className":"pt__0 pb__0 pl__0 pr__0"} -->
	<div class="wp-block-group alignfull pt__0 pb__0 pl__0 pr__0 has-background" style="background-color:#f7c7c6"><!-- wp:ainoblocks/hero {"mediaType":"image","verticalContentAlignment":"center","contentGridColumnStart":2,"contentGridColumnEnd":7,"mediaGridColumnStart":5,"mediaGridColumnEnd":12} -->
	<div class="wp-block-ainoblocks-hero alignfull content-vertically-aligned-center"><div class="wp-block-ainoblocks-hero__inner-container"><div class="wp-block-ainoblocks-hero__content" style="grid-column-start:2;grid-column-end:7"><!-- wp:heading {"placeholder":"Write heading…","textColor":"button-color-secondary","fontSize":"l"} -->
	<h2 class="has-button-color-secondary-color has-text-color has-l-font-size"><strong>Digital Creators</strong></h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"placeholder":"Start writing here…","textColor":"font-secondary","className":"hero-text col3","fontSize":"l"} -->
	<p class="hero-text col3 has-font-secondary-color has-text-color has-l-font-size">Hi, we are a small design agency from New Zealand. We love to create digital content and thrive to bring interactive experiences to life.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:ainoblocks/multiple-buttons {"items":1} -->
	<div class="wp-block-ainoblocks-multiple-buttons"><div class="wp-block-ainoblocks-multiple-buttons__inner"><!-- wp:ainoblocks/button {"backgroundColor":"black","label":"Find out more"} -->
	<div class="wp-block-ainoblocks-button"><a class="wp-block-ainoblocks-button__link size__m has-custom-background no-border-radius" style="background-color:black" target="_self" rel="noopener noreferrer">Find out more</a></div>
	<!-- /wp:ainoblocks/button --></div></div>
	<!-- /wp:ainoblocks/multiple-buttons --></div><figure class="wp-block-ainoblocks-hero__media" style="grid-column-start:5;grid-column-end:12"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/hero-01.png" alt=""/></figure></div></div>
	<!-- /wp:ainoblocks/hero --></div>
	<!-- /wp:group -->',
);