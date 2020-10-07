<?php
/**
 * The template for the displaying Author bio.
 *
 * @package Aino
 */

$avatar_xl = apply_filters( 'aino_author_bio_avatar_size', 144 );
$author    = get_the_author();
?>

<div class="authorbox__wrap">
	<h2 class="section-title"><?php esc_html_e( 'Published by', 'aino' ); ?></h2>

		<div class="authorbox__content">

			<?php
			if ( get_avatar( get_the_author_meta( 'user_email' ) ) && is_archive() ) :

				printf(
					'<div class="author-pic-link">' . get_avatar( get_the_author_meta( 'user_email' ), $avatar_xl ) . '</div>'
				);

			elseif ( get_avatar( get_the_author_meta( 'user_email' ) ) ) :

				printf(
					'<a class="author-pic-link" rel="author" href=" ' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) . ' ">' . get_avatar( get_the_author_meta( 'user_email' ), $avatar_xl ) . '</a>'
				);

			endif;
			?>

				<div class="authorbox__details">
				<?php if ( is_archive() ) : ?>
					<h1 class="author-name"><?php the_author(); ?></h1>
				<?php else : ?>
					<h3 class="author-name"><?php printf( "<a href=' " . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . " ' rel='author'>" . get_the_author() . '</a>' ); ?></h3>
				<?php endif; ?>

					<p class="author-bio"><?php the_author_meta( 'description' ); ?></p>
				</div><!-- end .authorbox__details -->
			</div><!-- end .authorbox__content -->
</div><!-- end .authorbox__wrap -->
