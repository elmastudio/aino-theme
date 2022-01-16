<?php
/**
 * Default header
 */
return array(
	'title'      => __( 'Default Header', 'aino' ),
	'categories' => array( 'header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '<!-- wp:group {"className":"site-header"} --><div class="wp-block-group site-header"><!-- wp:group {"className":"header-content"} --><div class="wp-block-group header-content"><!-- wp:site-title {"fontSize":"text-l"} /-->
	<!-- wp:ainoblocks/flexbox {"justifyContentDesktop":"justify__flexend__d","justifyContentTablet":"justify__flexend__t","justifyContentMobile":"justify__flexend__m"} --><div class="wp-block-ainoblocks-flexbox direction__row__d direction__row__t direction__row__m nowrap__d nowrap_t nowrap_m justify__flexend__d justify__flexend__t justify__flexend__m align-items__stretch__d align-items__stretch__t align-itms__stretch__m align-cont__stretch__d align-cont__stretch__t align-cont__stretch__m shadow-none"><!-- wp:navigation {"layout":{"type":"flex","orientation":"horizontal"},"fontSize":"text-s","textColor":"font-secondary"} /-->
	<!-- wp:social-links {"iconColor":"font-secondary","iconColorValue":"#282828","openInNewTab":true,"size":"has-normal-icon-size","className":"is-style-logos-only"} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only">
		<!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /-->
		<!-- wp:social-link {"url":"https://twitter.com/","service":"twitter"} /-->
		<!-- wp:social-link {"url":"https://www.youtube.com/","service":"youtube"} /-->
	</ul><!-- /wp:social-links -->
	</div><!-- /wp:ainoblocks/flexbox --></div><!-- /wp:group --></div><!-- /wp:group -->',
);