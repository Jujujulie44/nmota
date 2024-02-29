<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
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

<body class="mainContainer">
<?php wp_body_open(); ?>

	<header class="site-header">
		<nav id="site-navigation" class="siteNavigation" role="navigation">
			<div class="siteNavigation__logo">
				<a href="<?php echo home_url('/'); ?>">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png'; ?>" alt="Logo">
				</a>
			</div>

			<!-- Menu burger -->
			<div class="burgerMenu">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</div>
								
			<div class="siteNavigation__menu">
	
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'menu_class'     => 'navMenu',		
						)
				);
			?>
			</div>	
		</nav>

	</header><!-- #masthead -->
	<main>
	
