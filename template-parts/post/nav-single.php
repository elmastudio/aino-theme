<?php
/**
 * The template for displaying The Single Post Nav
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<nav class="navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'aino' ); ?></h2>
		<div class="nav-links cf">

<?php $prev_post = get_previous_post(); ?>

	<?php if ( ! empty( $prev_post ) ) : ?>
	<div class="nav-previous">

		<?php if ( has_post_thumbnail( $prev_post->ID ) ) : ?>
			<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev" class="nav-thumb"><?php echo get_the_post_thumbnail( $prev_post->ID, 'aino-s-squared' ); ?></a>
		<?php endif; ?>

		<h5 class="nav-title">
			<span><?php esc_html_e( 'Previous Post', 'aino' ); ?></span>
			<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev" class="entry-title"><?php echo esc_attr( $prev_post->post_title ); ?></a>
		</h5>

	</div><!-- .nav-previous -->
<?php endif; ?>

<?php $next_post = get_next_post(); ?>
<?php if ( ! empty( $next_post ) ) : ?>
	<div class="nav-next">

		<?php if ( has_post_thumbnail( $next_post->ID ) ) : ?>
			<a class="nav-thumb" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next"><?php echo get_the_post_thumbnail( $next_post->ID, 'aino-s-squared' ); ?></a>
		<?php endif; ?>

		<h5 class="nav-title">
			<span><?php esc_html_e( 'Next Post', 'aino' ); ?></span>
			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next"  class="entry-title"><?php echo esc_attr( $next_post->post_title ); ?></a>
		</h5>
	</div><!-- .nav-next -->
<?php endif; ?>

	</div><!-- .nav-links -->
	</nav><!-- .post-navigation -->
