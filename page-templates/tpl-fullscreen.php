<?php
/**
 * Template Name: Fullscreen
 *
 * Description: A Fullscreen Page template without page title and padding.
 *
 * @package Aino
 * @since Aino 0.0.5
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
