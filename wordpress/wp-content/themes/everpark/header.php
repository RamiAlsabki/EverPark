<?php
/**
 * Header of EverPark theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EverPark
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'everpark' ); ?></a>
	<header id="masthead" class="site-header">
		<div id="header-container" class="container-fluid p-0 m-0">
			<div id="header-row" class="row py-1">
				
				<div id="site-branding-column" class="col-2 d-flex align-items-center justify-content-center">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						echo '<div id="site-branding-text" class="site-name">' . get_bloginfo( 'name' ) . '</div>';
					}
					?>
				</div> <!-- End of #site-branding-column -->

				<div id="menu-column" class="col-8 d-flex justify-content-center aling-items-center flex-column text-center">
					<nav id="site-navigation" class="main-navigation d-flex justify-content-center align-items-center flex-column text-center">
						<button id="menu-toggle-mobile" class="menu-toggle btn btn-dark text-sm" aria-controls="primary-menu" aria-expanded="false"><i class="bi bi-list" id="hanburger-icon-header"></i></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								)
							);
						?>
					</nav> <!-- End of #site-navigation -->
				</div> <!-- End of #menu-column -->

				<div id="action-button-header" class="action-button col-2 d-flex justify-content-center align-items-center">
					<span id="">
						<a href="<?php echo esc_url( get_theme_mod( 'buy_button_link', '#' ) ); ?>" role="button" class="btn btn-primary text-uppercase"><i class="bi bi-ticket-perforated-fill"></i> <?php echo esc_html( get_theme_mod( 'buy_button_text', 'Buy Now' ) ); ?> </a>
					</span>
				</div> <!-- End of #action-button-header -->

			</div> <!-- End of #header-row -->
		</div> <!-- End of #header-container -->
	</header> <!-- End of #masthead -->
