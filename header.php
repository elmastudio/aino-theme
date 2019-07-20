<?php
/**
 * The header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Aino
 * @since 0.0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aino' ); ?></a>
		<header id="masthead" class="site-header masthead nav-down" role="banner">
			<?php get_template_part( 'template-parts/header/header', 'content' ); ?>
		</header><!-- #masthead -->

		<div class="content-wrap">
			<div id="content" class="site-content">
