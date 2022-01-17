<?php
/**
 * Team One Image small (Light version)
 */

return array(
	'title'      => __( 'One small team image, heading and intro text (Light)', 'aino' ),
	'categories' => array( 'team' ),
	'content'    => '<!-- wp:group {"align":"full","backgroundColor":"background-primary","paddingTop":15,"paddingBottom":17,"className":"fullwidth"} -->
	<div class="wp-block-group alignfull fullwidth has-background-primary-background-color has-background pt__15 pb__17"><!-- wp:ainoblocks/grid-container {"paddingTop":0} -->
	<div class="wp-block-ainoblocks-grid-container alignwide"><div class="wp-block-ainoblocks-grid-container__inner"><!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":1,"gridColumnEndDesktop":6,"gridColumnStartTablet":1,"gridColumnEndTablet":6,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"marginBottomTablet":0,"marginBottomMobile":7} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__1 col_end_d__6 col_start_t__1 col_end_t__6 col_start_m__1 col_end_m__13 align-self__start justify-self__start no-stacking mb_t__0 mb_m__7"><!-- wp:heading {"level":2,"textColor":"font-primary","fontSize":"text-5-xl"} -->
	<h2 class="has-font-primary-color has-text-color has-text-5-xl-font-size">Our story</h2>
	<!-- /wp:heading --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":6,"gridColumnEndDesktop":13,"gridColumnStartTablet":6,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__6 col_end_d__13 col_start_t__6 col_end_t__13 col_start_m__1 col_end_m__13 align-self__start justify-self__start no-stacking"><!-- wp:paragraph {"textColor":"font-secondary","fontSize":"text-m","paddingBottom":11} -->
	<p class="has-font-secondary-color has-text-color has-text-m-font-size pb__11">We are a creative team from Wellington, New Zealand who produce creative sustainable packaging solutions tailored to our clients individual needs. We have been working on new innovative ways to eliminate the waste created by small businesses for the last ten years. Each one of us has our strengths, combining them makes us a unique team.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/free/team-one-img-small.jpg" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:ainoblocks/grid-item --></div></div>
	<!-- /wp:ainoblocks/grid-container --></div>
	<!-- /wp:group -->',
);