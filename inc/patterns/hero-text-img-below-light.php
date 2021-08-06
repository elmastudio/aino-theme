<?php
/**
 * Hero Centered heading with CTA button and image below. (Light version)
 *
 * @package aino
 */

return array(
	'title'      => __( 'Centered heading with CTA button and image below (Light)', 'aino' ),
	'categories' => array( 'aino-hero' ),
	'content'    => '<!-- wp:group {"align":"full","backgroundColor":"background-primary","paddingBottom":0} -->
	<div class="wp-block-group alignfull has-background-primary-background-color has-background"><!-- wp:ainoblocks/grid-container {"paddingTop":13} -->
	<div class="wp-block-ainoblocks-grid-container alignwide pt__13"><div class="wp-block-ainoblocks-grid-container__inner"><!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":2,"gridColumnEndDesktop":12,"gridColumnStartTablet":2,"gridColumnEndTablet":12,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"justifyItem":"center","marginBottomTablet":0,"marginBottomMobile":0} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__2 col_end_d__12 col_start_t__2 col_end_t__12 col_start_m__1 col_end_m__13 align-self__start justify-self__center no-stacking mb_t__0 mb_m__0"><!-- wp:heading {"level":2,"textAlign":"center","textColor":"font-primary","fontSize":"xl","paddingBottom":0} -->
	<h2 class="has-text-align-center has-font-primary-color has-text-color has-xl-font-size">Design Ideas<br>for WordPress</h2>
	<!-- /wp:heading --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":5,"gridColumnEndDesktop":9,"gridColumnStartTablet":4,"gridColumnEndTablet":10,"gridColumnStartMobile":2,"gridColumnEndMobile":12,"justifyItem":"center","marginBottomTablet":0,"marginBottomMobile":0} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__5 col_end_d__9 col_start_t__4 col_end_t__10 col_start_m__2 col_end_m__12 align-self__start justify-self__center no-stacking mb_t__0 mb_m__0"><!-- wp:paragraph {"textColor":"font-secondary","align":"center","paddingTop":6} -->
	<p class="has-font-secondary-color has-text-color has-text-align-center pt__6">Let&#8217;s start to build innovative websites that stand out from the crowd.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:ainoblocks/grid-item -->
	
	<!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":2,"gridColumnEndDesktop":12,"gridColumnStartTablet":1,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"justifyItem":"center","marginBottomDesktop":12,"marginBottomTablet":11,"marginBottomMobile":8} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__2 col_end_d__12 col_start_t__1 col_end_t__13 col_start_m__1 col_end_m__13 align-self__start justify-self__center no-stacking mb_d__12 mb_t__11 mb_m__8"><!-- wp:ainoblocks/multiple-buttons {"align":"center","paddingTop":7,"paddingBottom":11} -->
	<div class="wp-block-ainoblocks-multiple-buttons aligncenter pt__7 pb__11"><div class="wp-block-ainoblocks-multiple-buttons__inner"><!-- wp:ainoblocks/button {"borderRadius":200,"backgroundColor":"#282828","textColor":"#ffffff","label":"Get started"} -->
	<div class="wp-block-ainoblocks-button" style="border-radius:200px"><a class="wp-block-ainoblocks-button__link size__m 200 has-custom-background has-custom-text-color" style="background-color:#282828;color:#ffffff;border-radius:200px">Get started</a></div>
	<!-- /wp:ainoblocks/button --></div></div>
	<!-- /wp:ainoblocks/multiple-buttons --></div>
	<!-- /wp:ainoblocks/grid-item --></div></div>
	<!-- /wp:ainoblocks/grid-container --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"align":"full","backgroundColor":"button-color-secondary","paddingBottom":17} -->
	<div class="wp-block-group alignfull has-button-color-secondary-background-color has-background pb__17"><!-- wp:ainoblocks/grid-container -->
	<div class="wp-block-ainoblocks-grid-container alignwide"><div class="wp-block-ainoblocks-grid-container__inner"><!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":2,"gridColumnEndDesktop":12,"gridColumnStartTablet":2,"gridColumnEndTablet":12,"gridColumnStartMobile":2,"gridColumnEndMobile":12,"marginTopDesktop":-12,"marginTopTablet":-11,"marginTopMobile":-8} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__2 col_end_d__12 col_start_t__2 col_end_t__12 col_start_m__2 col_end_m__12 align-self__start justify-self__start no-stacking mt_d__-12 mt_t__-11 mt_m__-8"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
	<figure class="wp-block-image size-large"><img src="' . get_stylesheet_directory_uri() . '/assets/images/pattern-lib/hero-01.jpg" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:ainoblocks/grid-item --></div></div>
	<!-- /wp:ainoblocks/grid-container --></div>
	<!-- /wp:group -->',
);
