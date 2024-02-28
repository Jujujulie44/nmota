<?php

/// Enqueue styles : 
function nmota_enqueue_styles() {

    // Enqueue jQuery from CDN
    wp_enqueue_script('jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);
    // Bibliotheque Select2 pour les selects de tri
    wp_enqueue_script('select2-js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
    wp_enqueue_style('select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array());

    
    // Enqueue CSS : 
    wp_enqueue_style( 'mota', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), time() );
    wp_enqueue_style( 'mota', get_stylesheet_directory_uri() . '/assets/css/nmota.css', array(), time() );


    // Enqueue JS : 
    wp_enqueue_script( 'mota', get_stylesheet_directory_uri() . '/assets/script/script.js', array( 'jquery' ), time(), true );
    wp_enqueue_script( 'modale-contact', get_stylesheet_directory_uri() . '/assets/script/modale-contact.js', array( 'jquery' ), time(), true );
    wp_enqueue_script( 'miniatures', get_stylesheet_directory_uri() . '/assets/script/miniatures.js', array( 'jquery' ), time(), true );
    wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/assets/script/lightbox.js', array( 'jquery' ), time(), true );
    // Enqueue filtres.js
    wp_enqueue_script('filtre-script', get_stylesheet_directory_uri() . '/assets/script/filtres.js', array('jquery'), '1.0.0', true);


}
add_action( 'wp_enqueue_scripts', 'nmota_enqueue_styles' );




// ENREGISTREMENT DES MENUS  //

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



// LOAD-MORE PHOTOS 

  // Ajout du script load-more-photos.js et filtre.js avec wp_localize_script pour passer des paramètres AJAX
function enqueue_load_more_photos_script()
{
    wp_enqueue_script('load-more-photos', get_stylesheet_directory_uri() . '/assets/script/load-more-photos.js', array('jquery'), null, true);

    wp_enqueue_script('filtres', get_stylesheet_directory_uri() . '/assets/script/filtres.js', array('jquery'), null, true);

    // Utilisez wp_localize_script pour passer des paramètres à votre script
    wp_localize_script('load-more-photos', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));

    wp_localize_script('filtre', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_photos_script');

// Fonction pour charger plus de photos via AJAX
function load_more_photos()
{
    // Récupère le numéro de page à partir des données POST
    $page = $_POST['page'];

    // Arguments de la requête pour récupérer les photos
    $args = array(
        'post_type'      => 'photos',     // Type de publication : photo
        'posts_per_page' => -1,          // Nombre de photos par page (-1 pour toutes)
        'orderby'        => 'rand',      // Tri aléatoire
        'order'          => 'ASC',       // Ordre ascendant
        'paged'          => $page,       // Numéro de page
    );

    // Exécute la requête WP_Query avec les arguments
    $photo_block = new WP_Query($args);

    // Vérifie s'il y a des photos dans la requête
    if ($photo_block->have_posts()) :
        // Boucle à travers les photos
        while ($photo_block->have_posts()) :
            $photo_block->the_post();
            // Inclut la partie du modèle pour afficher un bloc de photo
            get_template_part('template-parts/bloc-photo', get_post_format());
        endwhile;

        // Réinitialise les données post
        wp_reset_postdata();
    else :
        // Aucune photo trouvée
        echo 'Aucune photo trouvée.';
    
    endif;

    // Termine l'exécution de la fonction
    die();
}

// Ajoute l'action AJAX pour les utilisateurs connectés
add_action('wp_ajax_load_more_photos', 'load_more_photos');
// Ajoute l'action AJAX pour les utilisateurs non connectés
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

// Fonction pour filtrer les photos via AJAX
function filter_photos()
{
    // Vérifiez si l'action est définie
    if (isset($_POST['action']) && $_POST['action'] == 'filter_photos') {
        // Récupérez les filtres et nettoyez-les
        $filter = array_map('sanitize_text_field', $_POST['filter']);

        // Ajoutez des messages de débogage pour voir les valeurs reçues
        error_log('Filter values: ' . print_r($filter, true));

        // Construisez votre requête WP_Query avec les filtres
        $args = array(
            'post_type'      => 'photos',
            'posts_per_page' => -1,
            'orderby'        => 'rand',
            'order'          => 'ASC',
            'tax_query'      => array(
                'relation' => 'AND',
            ),
        );

        // Ajoutez la taxonomie pour la catégorie si elle est spécifiée
        if (!empty($filter['category'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'categorie_photo',
                'field'    => 'slug',
                'terms'    => $filter['category'],
            );
        }

        // Ajoutez la taxonomie pour l'année si elle est spécifiée
        if (!empty($filter['years'])) {
            $args['order'] = ($filter['years'] == 'date_desc') ? 'DESC' : 'ASC';
        }

        // Ajoutez la taxonomie pour le format si elle est spécifiée
        if (!empty($filter['format'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'format',
                'field'    => 'slug',
                'terms'    => $filter['format'],
            );
        }

        // Effectuez la requête WP_Query
        $query = new WP_Query($args);

        // Vérifiez si la requête a réussi
        if ($query->have_posts()) {
            // Boucle à travers les résultats de la requête
            while ($query->have_posts()) :
                $query->the_post();
                // Récupérez et affichez les informations de chaque photo
                $photoId      = get_post_thumbnail_id();
                $reference    = get_field('reference');
                $refUppercase = strtoupper($reference);

                // Ajoutez des messages de débogage pour les champs ACF
                error_log('Photo ID: ' . $photoId);
                error_log('Reference: ' . $reference);

                // Affiche le bloc de photo
                get_template_part('template-parts/bloc-photo');
            endwhile;

            // Réinitialisez les données de requête après la boucle de requête
            wp_reset_query();
        } else {
            // Aucune photo ne correspond aux critères de filtrage
            echo '<p class="critereFiltrage">Aucune photo ne correspond aux critères de filtrage</p>';
        }
    }

    // Assurez-vous que votre code renvoie la sortie souhaitée pour le traitement AJAX
    die();
}

// Hook pour les utilisateurs connectés
add_action('wp_ajax_filter_photos', 'filter_photos');
// Hook pour les utilisateurs non connectés
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');