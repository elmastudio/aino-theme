<?php
/**
 * Template Name: Fullscreen
 *
 * Description: A Fullscreen Page template without page title and padding and with a light header style.
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
