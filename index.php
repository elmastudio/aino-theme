<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aino
 * @since Aino 0.0.1
 * @version 1.0.2
 */

get_header(); ?>

<?php
	// Sticky Posts.
	$sticky       = get_option( 'sticky_posts' );
	$args_sticky  = array(
		'post__in' => $sticky,
	);
	$query_sticky = new WP_Query( $args_sticky );
	?>

	<div id="primary" class="content-area">

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h2 class="page-title screen-reader-text"><?php esc_html_e( 'Posts', 'aino' ); ?></h2>
			</header>
		<?php endif; ?>

		<main id="main" class="site-main" role="main">

		<div class="posts-container" id="posts-container">

			<?php if ( ! is_paged() && $sticky ) : ?>

				<div class="sticky-container">

				<?php
				if ( $query_sticky->have_posts() ) :

					while ( $query_sticky->have_posts() ) :
						$query_sticky->the_post();

						get_template_part( 'template-parts/post/content-sticky' );

					endwhile;

						/* Restore original Post Data */
						wp_reset_postdata();

				endif;
				?>

					</div><!-- .sticky-container -->
				<?php endif; ?>


			<?php
			if ( have_posts() ) :
				?>

				<?php
				// Start the Standard Loop.
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post/content' );
				endwhile;
				?>

		<?php endif; ?>

	</div><!-- .posts-container -->

		<?php
		the_posts_pagination(
			array(
				'next_text'          => aino_get_svg( array( 'icon' => 'baseline-chevron_right-24px' ) ) . '<span class="meta-nav">' . esc_html__( 'Older posts', 'aino' ) . '</span> ' .
				'<span class="screen-reader-text">' . esc_html__( 'Older posts', 'aino' ) . '</span> ',
				'prev_text'          => aino_get_svg( array( 'icon' => 'baseline-chevron_left-24px' ) ) . '<span class="meta-nav">' . esc_html__( 'Newer posts', 'aino' ) . '</span> ' .
				'<span class="screen-reader-text">' . esc_html__( 'Newer posts', 'aino' ) . '</span> ',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'aino' ) . ' </span>',
			)
		);
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
