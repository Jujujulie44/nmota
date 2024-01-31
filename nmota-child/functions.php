<?php

/// Enqueue styles
function nmota_child_enqueue_styles() {
    // Enqueue parent theme's stylesheet
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // Enqueue child theme's stylesheet
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
    // Enqueue additional custom stylesheet
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom.css', array('parent-style', 'child-style') );
}
add_action( 'wp_enqueue_scripts', 'nmota_child_enqueue_styles' );




// FOOTER 
function nmota_register_menu() {
    register_nav_menu(
      'nmota-footer',
      'footer-menu'
    );
  }
  add_action( 'after_setup_theme', 'nmota_register_menu' );
?>