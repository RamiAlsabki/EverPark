<?php
/**
 * The template for displaying home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EverPark
 */

get_header();
?>

<main id="primary" class="site-main">
<?php 
	get_template_part('template-parts/front-page/hero-section'); 
	get_template_part('template-parts/front-page/video-section'); 
	get_template_part('template-parts/front-page/latest-posts-section'); 


?>

</main><!-- End of #main -->

<?php
get_footer();
