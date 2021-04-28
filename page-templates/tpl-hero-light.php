<?php
/**
 * Template Name: Hero, light header
 *
 * Description: A fullscreen page template for a page with the Hero block and a light header style.
 *
 * @package Aino
 * @since Aino 0.3.0
 */

get_header(); ?>

<?php
while (
	have_posts() ) :
	the_post();

	get_template_part( 'template-parts/page/content', 'page-fullscreen' );

endwhile; // End of the loop.
?>

<?php
get_footer();
