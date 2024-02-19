<div class="banner">
    <h1>Photographe event</h1>
    <?php
        // Arrgument de la requête pour récupérer une photo random
        $photo_args = array(
            'post_type'      => 'photos',
            'posts_per_page' => 1,
            'orderby'        => 'rand', // Tri aléatoire
        );

        // Requête WordPress avec les arguments définis
        $photo_query = new WP_Query($photo_args);
        // Vérification si des photos sont disponibles
        if ($photo_query->have_posts()) {
            // Boucle à travers les photos
            while ($photo_query->have_posts()) {
                $photo_query->the_post();
                // Affichage de la photo en full size
                echo get_the_post_thumbnail(get_the_ID(), 'full');
            }
            // Réinitialisation des données de publication après la boucle
            wp_reset_postdata();
        }
    ?>
</div>