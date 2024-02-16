<?php

/// Enqueue styles
function nmota_enqueue_styles() {
    
    // Enqueue CSS : 
    wp_enqueue_style( 'mota', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), time() );


    // Enqueue JS : 
    wp_enqueue_script( 'mota', get_stylesheet_directory_uri() . '/assets/script/script.js', array( 'jquery' ), time(), true );
    //wp_enqueue_script( 'mota', get_stylesheet_directory_uri() . '/assets/script/miniature.js', array( 'jquery' ), time(), true );


}
add_action( 'wp_enqueue_scripts', 'nmota_enqueue_styles' );




// FOOTER //

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



  // SHORTCODE BANNIERE // 

  add_shortcode('banniere-titre', 'banniere_titre_func');

  function banniere_titre_func($atts) {
    $atts = shortcode_atts(array(
      'src' => '', 
      'titre' => 'Titre'
    ), $atts, 'banniere-titre');

    ob_start();

    if($atts['src'] != "") {
      ?>
      <div class="banniere-titre" style="background-image: url(<?= $atts['src'] ?>);">
          <h2 class="titre"><?= $atts['titre'] ?></h2>
      </div>
      <?php
    }

    $output = ob_get_contents();
    ob_end_clean();

    return $output; 
  }

?>