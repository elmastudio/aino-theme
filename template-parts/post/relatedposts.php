<?php
/**
 * The template for displaying Related Posts
 *
 * @package Aino
 * @since Aino 0.0.1
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
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => 1,
	);

	$rp_query = new wp_query( $args );
	if ( $rp_query->have_posts() ) {
		echo '<div class="related-wrap">
				<div class="related cf">
					<h2 class="section-title"> ' . esc_html__( 'Related Posts', 'aino' ) . '<a class="related-more-link btn-outline btn-s" href=" ' . esc_url( $category_link ) . ' ">' . esc_html__( 'View more', 'aino' ) . '</a></h2>

		<div class="related-container">';

		while ( $rp_query->have_posts() ) {
			$rp_query->the_post();
			?>
			<div class="related-post">
				<a href="<?php the_permalink(); ?>" class="related-img"><?php the_post_thumbnail( 'aino-m' ); ?></a>
					<div class="related-post-content">
						<?php the_title( sprintf( '<h3 class="related-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						<a href="<?php the_permalink(); ?>" class="btn-naked btn-s"><?php echo esc_html__( 'Read more', 'aino' ); ?></a>
					</div><!-- end .related-post-content -->
			</div><!-- end .related-post -->
			<?php
		}
		echo '</div>
		</div>
	</div>';
	}
}

wp_reset_postdata(); ?>
