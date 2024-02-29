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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">

			<div class="site-branding">
				<?php
					the_custom_logo();
				?>
			</div><!-- .site-branding -->
			
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'container' => 'nav',
						'container_id' => 'site-nav-id',
						'container_class' => 'site-nav-class',
						'menu_class' => 'site-menu-class', 
						'menu_id' => 'site_menu_id'			)
				);
				?>
				
			

			<!-- menu burger -->
			<div class="burgerMenu">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</div>

	
	</header><!-- #masthead -->
	<main>
