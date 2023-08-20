<?php
/**
 * Footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EverPark
 */
?>

<footer id="colophon" class="site-footer">
	<div class="site-info footer">
		<div id="footer-container" class="container-fluid m-0">
			<div id="footer-row" class="row m-0 text-center">

				<div id="footer-logo-column" class="col-12 m-0 py-5">
					<?php 
					the_custom_logo() 
					?>
				</div> <!-- End of #footer-logo-column -->

				<div id="footer-text-column" class="col-12 m-0 pb-5">
				<?php
				/* 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s | Made with ❤️ and ☕ by&nbsp; %2$s', 'everpark' ), 'EverPark', '<a href="http://meetrami.com" id="footer-ref">Rami Alsabki </a>' );
				?>
				</div> <!-- End of #footer-text-column -->

			</div> <!-- End of #footer-row -->
		</div> <!-- End of #footer-container -->
	</div><!-- End of .site-info -->
</footer><!-- End of #colophon -->
</div><!-- End of #page -->

<?php 
wp_footer(); 
?>

</body>
</html>
