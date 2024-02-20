<?php
$args = array(
    'post_type'      => 'photos',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'ASC',
);
$photo_block = new WP_Query($args);

// Vérification s'il y a des photos
if ($photo_block->have_posts()) :

    // Définir les arguments pour le bloc photo
    set_query_var('photo_block_args', array('context' => 'front-page'));

    // Boucle pour afficher chaque photo
    while ($photo_block->have_posts()) :
        $photo_block->the_post();
        get_template_part('template-parts/bloc-photo', get_post_format());
    endwhile;

    // Réinitialisation de la requête
    wp_reset_postdata();
else :
    echo 'Aucune photo trouvée.';
endif;
?>

<!-- Bloc pour le chargement de plus de photos -->
<div id="blockPusdImage">
    <button id="plusDImage" data-page="1" data-url="">Charger plus</button>
</div>
