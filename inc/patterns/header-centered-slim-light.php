<?php
/**
 * Slim centered header (Light version)
 *
 * @package aino
 */

return array(
	'title'      => __( 'Slim centered header with site logo, navigation and social links (Light)', 'aino' ),
	'blockTypes' => array( 'core/block-template-part/header' ),
	'categories' => array( 'aino-header' ),
	'content'    => '<!-- wp:group {"align":"full","className":"site-header__wrap"} -->
	<div class="wp-block-group site-header__wrap alignfull">
	
		<!-- wp:group {"className":"site-header__content"} -->
		<div class="wp-block-group site-header__content">

			<!-- wp:site-logo {"width":48} /-->
			<!-- wp:navigation {"isResponsive":true,"__unstableLocation":"primary","fontSize":"m","textColor":"font-secondary"} /-->
	
			<!-- wp:social-links {"iconColor":"font-secondary","iconColorValue":"#282828","openInNewTab":true,"size":"has-normal-icon-size","className":"is-style-logos-only"} -->
		<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
			<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->
			<!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
			<!-- wp:social-link {"url":"https://www.youtube.com/","service":"youtube"} /--></ul>
			<!-- /wp:social-links -->
	
		</div>
		<!-- /wp:group -->
	
	</div>
	<!-- /wp:group -->',
);