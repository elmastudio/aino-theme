<?php
/**
 * Slim centered header (Dark version)
 *
 * @package aino
 */

return array(
	'title'      => __( 'Slim centered header with site title, navigation and social links (Dark).', 'aino' ),
	'categories' => array( 'aino-header' ),
	'content'    => '<!-- wp:group {"backgroundColor":"variant-background-primary","className":"site-header__wrap outer-margins"} -->
	<div class="wp-block-group site-header__wrap header-dark has-variant-background-primary-background-color has-background outer-margins">
	
		<!-- wp:group {"className":"site-header__content","align":"wide"} -->
		<div class="wp-block-group site-header__content alignwide">

			<!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|variant-font-primary"}}}}} /-->
			<!-- wp:navigation {"isResponsive":true,"__unstableLocation":"primary","fontSize":"m","textColor":"variant-font-secondary"} /-->
	
			<!-- wp:social-links {"iconColor":"variant-font-secondary","iconColorValue":"#d9d9d9","openInNewTab":true,"size":"has-normal-icon-size","className":"is-style-logos-only"} -->
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