<?php
/**
 * Template part for displaying posts
 *
 * @package Aino
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
			printf( '<span class="sticky-post badge-highlight"><span class="sticky-icon">' . aino_get_svg( array( 'icon' => 'star-line' ) ) . '</span>%s</span>', esc_attr__( 'Featured', 'aino' ) );
		}
		?>

		<?php if ( '' !== get_the_post_thumbnail() ) : ?>
			<div class="post-thumb">
				<?php the_post_thumbnail( 'aino-thumb' ); ?>
			</div><!-- .post-thumb -->
		<?php endif; ?>

		<header class="entry-header">

			<span class="entry-cats"><?php aino_the_categories(); ?></span>

			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<?php if ( 0 !== get_theme_mod( 'post_excerpt_lengths' ) ) : ?>
				<div class="entry-summary">
					<?php if ( 15 === get_theme_mod( 'post_excerpt_lengths' ) ) : ?>
						<?php echo esc_html( aino_custom_excerpt_length( 15 ) ); ?>
					<?php else : ?>
						<?php echo esc_html( aino_custom_excerpt_length( $custom_post_excerpt['post_excerpt_length'] ) ); ?>
					<?php endif; ?>
				</div><!-- .entry-summary -->
			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-footer">
			<?php
			$check = get_theme_mod( 'blogcards_author', aino_defaults( 'blogcards_author' ) );

			if ( get_avatar( get_the_author_meta( 'user_email' ) ) && ( $check ) ) :
				?>
				<figure class="author-avatar">
				<?php
				$author_bio_avatar_size = apply_filters( 'aino_author_bio_avatar_size', 48 );
				echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				?>
				</figure>
			<?php endif; ?>

			<div class="entry-meta">

				<?php if ( $check ) : ?>
					<span class="author-name"><?php printf( get_the_author() ); ?></span>
				<?php endif; ?>

				<?php if ( comments_open() ) : ?>
					<span class="entry-comments">
					<?php comments_number( '<span class="leave-reply">' . esc_html__( 'Comments 0', 'aino' ) . '</span>', esc_html__( 'Comment 1', 'aino' ), esc_html__( 'Comments %', 'aino' ) ); ?>
					</span><!-- end .entry-comments -->
				<?php endif; ?>

				<?php aino_entry_date_blog(); ?>

			</div><!-- .entry-meta -->
		</div><!-- .entry-footer -->
	</a><!-- .entry-link -->
</article><!-- #post-## -->
