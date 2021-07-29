<?php
/**
 * Template Name: Fullscreen
 *
 * Description: A Fullscreen Page template without page title and padding and with a light header style.
 *
 * @package Aino
 */

get_header(); ?>

<header class="site-header">
	<?php echo gutenberg_block_template_part( 'header' ); ?>
</header>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content col push-center">
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aino' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<footer class="site-footer">
	<?php echo gutenberg_block_template_part( 'footer' ); ?>
</footer>