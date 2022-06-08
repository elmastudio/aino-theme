<?php
/**
 * Default footer
 */
return array(
	'title'      => __( 'Default footer', 'aino' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"backgroundColor":"background-secondary","className":"site-footer","paddingTop":10,"paddingBottom":10} -->
	<div class="wp-block-group site-footer has-background-secondary-background-color has-background pt__10 pb__10"><!-- wp:ainoblocks/grid-container {"className":"site-info footer-content"} -->
	<div class="wp-block-ainoblocks-grid-container alignwide site-info footer-content"><div class="wp-block-ainoblocks-grid-container__inner"><!-- wp:ainoblocks/grid-item {"gridColumnStartDesktop":2,"gridColumnEndDesktop":12,"gridColumnStartTablet":1,"gridColumnEndTablet":13,"gridColumnStartMobile":1,"gridColumnEndMobile":13,"alignItem":"center","justifyItem":"stretch","marginTopDesktop":0,"className":"center"} -->
	<div class="wp-block-ainoblocks-grid-item col_start_d__2 col_end_d__12 col_start_t__1 col_end_t__13 col_start_m__1 col_end_m__13 align-self__center justify-self__stretch no-stacking mt_d__0 center"><!-- wp:paragraph {"align":"center","textColor":"font-secondary","fontSize":"text-xxs"} --><p class="has-text-align-center has-font-secondary-color has-text-color has-text-xxs-font-size">© 2022 </p>
	<!-- /wp:paragraph --><!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"text-xxs"} /--><!-- wp:paragraph {"align":"center","textColor":"font-secondary","fontSize":"text-xxs"} --><p class="has-text-align-center has-font-secondary-color has-text-color has-text-xxs-font-size"> Built with <a rel="nofollow" href="https://ainoblocks.io/">AinoBlocks</a>.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:ainoblocks/grid-item --></div></div>
	<!-- /wp:ainoblocks/grid-container --></div>
	<!-- /wp:group -->',
);