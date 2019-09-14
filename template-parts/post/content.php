<?php
/**
 * Template part for displaying posts
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<?php
$custom_post_excerpt = array(
	'post_excerpt_length' => get_theme_mod( 'post_excerpt_lengths' ),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="entry-link" href="<?php the_permalink(); ?>">

		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post badge-highlight">%s</span>', esc_attr__( 'Featured', 'aino' ) );
		}
		?>

		<?php if ( '' !== get_the_post_thumbnail() && 'onecolumn' === get_theme_mod( 'blog_columns' ) ) : ?>
			<div class="post-thumb">
				<?php the_post_thumbnail( 'aino-l' ); ?>
			</div><!-- .post-thumb -->
		<?php elseif ( '' !== get_the_post_thumbnail() ) : ?>
			<div class="post-thumb">
				<?php the_post_thumbnail( 'aino-m' ); ?>
			</div><!-- .post-thumb -->
		<?php endif; ?>

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php if ( 0 !== get_theme_mod( 'post_excerpt_lengths' ) ) : ?>

				<div class="entry-summary">
					<?php if ( aino_defaults( 'post_excerpt_lengths' ) === get_theme_mod( 'post_excerpt_lengths' ) ) : ?>
						<?php echo esc_html( aino_custom_excerpt_length( aino_defaults( 'post_excerpt_lengths' ) ) ); ?>
					<?php else : ?>
						<?php echo esc_html( aino_custom_excerpt_length( $custom_post_excerpt['post_excerpt_length'] ) ); ?>
					<?php endif; ?>
				</div><!-- .entry-summary -->

				<?php endif; ?>

			</header><!-- .entry-header -->

			<footer class="entry-footer">
				<?php
				$check = get_theme_mod( 'blogcards_authororcats', aino_defaults( 'blogcards_authororcats' ) );
				if ( get_avatar( get_the_author_meta( 'user_email' ) ) && ( $check ) ) :
					?>
					<figure class="author-avatar">
					<?php
					$author_bio_avatar_size = apply_filters( 'aino_author_bio_avatar_size', 40 );
					echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
					?>
					</figure>
				<?php endif; ?>

				<aside class="entry-meta">
					<?php if ( ( ! $check ) ) : ?>
						<span class="entry-cats"><?php aino_the_categories(); ?></span>
					<?php endif; ?>

					<?php if ( $check ) : ?>
						<span class="author-name"><?php printf( get_the_author() ); ?></span>
					<?php endif; ?>

					<?php aino_entry_date_blog(); ?>

					<?php if ( comments_open() ) : ?>
						<span class="entry-comments">
						<?php comments_number( '<span class="leave-reply">' . esc_html__( 'Comments 0', 'aino' ) . '</span>', esc_html__( 'Comment 1', 'aino' ), esc_html__( 'Comments %', 'aino' ) ); ?>
						</span><!-- end .entry-comments -->
					<?php endif; ?>

					<?php aino_estimated_read_time(); ?>
				</aside><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
	</a><!-- .entry-link -->
	<?php aino_edit_link(); ?>
</article><!-- #post-## -->
