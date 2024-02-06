<?php

/// Enqueue styles
function nmota_enqueue_styles() {
    
    // Enqueue additional custom stylesheet
    wp_enqueue_style( 'mota', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), time() );
    // Enqueue custom JavaScript file
    wp_enqueue_script( 'mota', get_stylesheet_directory_uri() . '/assets/script/script.js', array( 'jquery' ), time(), true );
}
add_action( 'wp_enqueue_scripts', 'nmota_enqueue_styles' );




// FOOTER 
function nmota_register_menu() {
    register_nav_menus(
      array(
        'header-menu'=>'Menu principal',
        'footer-menu'=>'Menu footer',
      )
    );
    add_theme_support('custom-logo'); 
    add_theme_support('post-thumbnails'); 
    add_theme_support('title-tag'); 
  }
  add_action( 'after_setup_theme', 'nmota_register_menu' );





/**
 * Shortcode pour ajouter un bouton contact
*/
function contact_btn($string) {

	/** Code du bouton */
	$string .= '<a href="#" id="contact_btn" class="contact">Contact</a>';

	/** On retourne le code  */
	return $string;
}

/** On publie le shortcode  */
add_shortcode('contact', 'contact_btn');
?>