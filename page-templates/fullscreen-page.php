<?php
/**
 * Template Name: Fullscreen
 *
 * Description: A page template for a Fullscreen Page without page title.
 *
 * @package Aino
 * @since Aino 0.0.1
 */

get_header(); ?>

<?php
while (
	have_posts() ) :
	the_post();

	get_template_part( 'template-parts/page/content', 'page' );

endwhile; // End of the loop.
?>

<?php
get_footer();
