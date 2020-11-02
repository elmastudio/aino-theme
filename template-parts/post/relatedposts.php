<?php
/**
 * The template for displaying Related Posts
 *
 * @package Aino
 */

?>

<?php
global $post;

// Get the category IDs.
$categories = get_the_category( $post->ID );
// Get the URL of this category.
$category_link = get_category_link( $categories[0] );

if ( $categories ) {
	$category_ids = array();
	foreach ( $categories as $individual_category ) {
		$category_ids[] = $individual_category->term_id;
	}

	$args = array(
		'category__in'        => $category_ids,
		'post__not_in'        => array( $post->ID ),
		'posts_per_page'      => 2,
		'ignore_sticky_posts' => 1,
	);

	$rp_query = new wp_query( $args );
	if ( $rp_query->have_posts() ) {
		echo '<div class="related-wrap">
				<h2 class="section-title outer-margins"><span> ' . esc_html__( 'Related Posts', 'aino' ) . '</span></h2>
				<div class="related-container mobile-margins">';

				while ( $rp_query->have_posts() ) {
					$rp_query->the_post();
					?>
					<div class="related-post">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="related-img"><?php the_post_thumbnail( 'aino-l' ); ?></div>
						<?php endif; ?>
						<div class="related-post-content">
							<span class="entry-cats"><?php the_category( ', ' ); ?></span>
							<?php the_title( sprintf( '<h3 class="related-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						</div><!-- end .related-post-content -->
					</div><!-- end .related-post -->
					<?php
				}
		echo '</div>
	</div>';
	}
}

wp_reset_postdata(); ?>
