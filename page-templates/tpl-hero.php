<?php
/**
 * Template Name: Hero
 *
 * Description: A fullscreen page template for a page with the Hero block.
 *
 * @package Aino
 * @since Aino 0.0.5
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
