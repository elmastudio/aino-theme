<?php
/**
 * The template for displaying the footer
 *
 * @package Aino
 */

?>

	</div><!-- .site-content -->
</div><!-- .content-wrap -->

	<div class="site-footer">
		<div class="footer-wrap col12 push-center mobile-margins">

			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

			<div class="footer-info col-margins">

				<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

				<?php get_template_part( 'template-parts/footer/footer', 'menu-social' ); ?>

				<a class="back-top" href="#site-header">
					<span><?php printf( __( 'Back to Top', 'aino' ) ); ?></span>
				</a><!-- .back-top -->
			</div><!-- .footer-info -->
		</div><!-- .footer-wrap -->
	</div><!-- .site-footer -->
</div><!-- #page -->

<div id="top-of-site-pixel-anchor"></div>

<?php wp_footer(); ?>

</body>
</html>
