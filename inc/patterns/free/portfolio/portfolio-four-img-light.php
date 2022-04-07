<?php
/**
 * Portfolio with small heading and two column images. (Light version)
 */

return array(
	'title'      => __( 'Small heading and two column images (Light)', 'aino' ),
	'categories' => array( 'portfolio' ),
	'content'    => '<!-- wp:group {"backgroundColor":"background-primary","align":"full","paddingTop":15,"paddingBottom":17,"className":"fullwidth"} -->
	<div class="wp-block-group alignfull fullwidth has-background-primary-background-color has-background pt__15 pb__17"><!-- wp:ainoblocks/grid-container -->
	<div class="wp-block-ainoblocks-grid-container alignwide"><div class="wp-block-ainoblocks-grid-container__inner"><!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":1,"gridColumnEndDesktop":4,"gridColumnStartTablet":1,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"justifyItem":"stretch","marginBottomTablet":11,"marginBottomMobile":0,"className":"two-col-grid-tablet"} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__1 col_end_d__4 col_start_t__1 col_end_t__13 col_start_m__1 col_end_m__13 align-self__start justify-self__stretch no-stacking mb_t__11 mb_m__0 two-col-grid-tablet"><!-- wp:heading {"textColor":"font-primary","fontSize":"text-l","paddingBottom":7} -->
	<h2 class="has-font-primary-color has-text-color has-text-l-font-size pb__7">Packaging Design</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"textColor":"font-secondary","fontSize":"text-xs","paddingTop":0} -->
	<p class="has-font-secondary-color has-text-color has-text-xs-font-size">We had the pleasure to design the new packaging of Wallis cookies, a famous New Zealand vegan dog cookies brand.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":5,"gridColumnEndDesktop":13,"gridColumnStartTablet":1,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__5 col_end_d__13 col_start_t__1 col_end_t__13 col_start_m__1 col_end_m__13 align-self__start justify-self__start no-stacking"><!-- wp:ainoblocks/grid-container -->
	<div class="wp-block-ainoblocks-grid-container alignwide"><div class="wp-block-ainoblocks-grid-container__inner"><!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":1,"gridColumnEndDesktop":7,"gridColumnStartTablet":1,"gridColumnEndTablet":7,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"alignItem":"stretch","justifyItem":"stretch","marginTopTablet":0,"marginTopMobile":10} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__1 col_end_d__7 col_start_t__1 col_end_t__7 col_start_m__1 col_end_m__13 align-self__stretch justify-self__stretch no-stacking mt_t__0 mt_m__10"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/free/portfolio-four-img-01.jpg" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":7,"gridColumnEndDesktop":13,"gridColumnStartTablet":7,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"alignItem":"stretch","justifyItem":"stretch","marginTopTablet":0,"marginTopMobile":6} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__7 col_end_d__13 col_start_t__7 col_end_t__13 col_start_m__1 col_end_m__13 align-self__stretch justify-self__stretch no-stacking mt_t__0 mt_m__6"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/free/portfolio-four-img-02.jpg" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":1,"gridColumnEndDesktop":7,"gridColumnStartTablet":1,"gridColumnEndTablet":7,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"alignItem":"stretch","justifyItem":"stretch"} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__1 col_end_d__7 col_start_t__1 col_end_t__7 col_start_m__1 col_end_m__13 align-self__stretch justify-self__stretch no-stacking"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","paddingTop":10} -->
	<figure class="wp-block-image size-full pt__10"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/free/portfolio-four-img-03.jpg" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":7,"gridColumnEndDesktop":13,"gridColumnStartTablet":7,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"alignItem":"stretch","justifyItem":"stretch"} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__7 col_end_d__13 col_start_t__7 col_end_t__13 col_start_m__1 col_end_m__13 align-self__stretch justify-self__stretch no-stacking"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","paddingTop":10} -->
	<figure class="wp-block-image size-full pt__10"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/free/portfolio-four-img-04.jpg" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:ainoblocks/grid-item --></div></div>
	<!-- /wp:ainoblocks/grid-container --></div>
	<!-- /wp:ainoblocks/grid-item --></div></div>
	<!-- /wp:ainoblocks/grid-container --></div>
	<!-- /wp:group -->',
);