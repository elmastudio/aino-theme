<?php
/**
 * Template Name: Shop
 *
 * Description: A page template for the WooCommerce shop archive page.
 *
 * @package Aino
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/page/content', 'page' );

	endwhile; // End of the loop.
	?>

</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
