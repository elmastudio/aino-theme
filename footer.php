<?php
/**
 * The template for displaying the footer
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

	</div><!-- #content -->
</div><!-- .content-wrap -->

	<footer id="colophon" class="site-footer">

		<div class="footer-wrap">

		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

		<div class="footer-info">

		<?php get_template_part( 'template-parts/footer/footer', 'menu-social' ); ?>

		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

		</div>

		</div><!-- .footer-wrap -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
