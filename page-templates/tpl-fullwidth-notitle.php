<?php
/**
 * Template Name: Full Width, no page title
 *
 * Description: A page template with 1200px wide pages. The default page title is hidden.
 *
 * @package Aino
 * @since Aino 0.0.1
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/page/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
