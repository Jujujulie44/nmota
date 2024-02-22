<?php

/// Enqueue styles : 
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




function enqueue_load_more_photos_script() {
    wp_enqueue_script('load-more-photos', get_template_directory_uri() . '/assets/js/load-more-photos.js', array('jquery'), null, true);

    // Passer des paramètres AJAX à votre script
    wp_localize_script('load-more-photos', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_photos_script');


function load_more_photos() {
    $page = $_POST['page'];
    $args = array(
        'post_type'      => 'photo',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'paged'          => $page,
    );

    $photo_block = new WP_Query($args);

    if ($photo_block->have_posts()) :
        while ($photo_block->have_posts()) :
            $photo_block->the_post();
            get_template_part('template-parts/bloc-photo', get_post_format());
        endwhile;
        wp_reset_postdata();
    else :
        echo 'Aucune photo trouvée.';
    endif;

    die(); // N'oubliez pas cette ligne pour terminer le traitement AJAX
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos'); // Pour les utilisateurs non connectés





?>