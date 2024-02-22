<?php
// Affichage des taxo
$taxonomy = [ 
    'categorie_photo' => 'CATÉGORIES',
    'format' => 'FORMATS',
    'annees' => 'TRIER PAR',
];

echo "<div id='filtrePhoto'>";
echo "<div class='left-section'>";

foreach ($taxonomy as $taxonomy_slug => $label) {
    if ($taxonomy_slug !== 'annees') { // Exclure 'annees' de la section gauche
        $terms = get_terms($taxonomy_slug);
        if ($terms && !is_wp_error($terms)) {
            // Ajoutez une classe CSS spécifique pour chaque select
            $select_class = 'custom-select ' . $taxonomy_slug . '-select';

            echo "<div class='taxonomy-container'>";
            echo "<select id='$taxonomy_slug' class='$select_class'>";

            echo "<option value=''>$label</option>";
            foreach ($terms as $term) {
                echo "<option value='$term->slug'>$term->name</option>";
            }
            echo "</select>";
            echo "</div>";
        }
    }
}

echo "</div>"; // Fin de la section gauche
echo "<div class='right-section'>";

// Affichage pour 'annees' dans la section droite

// Affichage pour 'annees' dans la section droite
$terms_annees = get_terms('annee');
if ($terms_annees && !is_wp_error($terms_annees)) {
    $select_class_annees = 'custom-select annees-select';
    echo "<div class='taxonomy-container'>";
    echo "<select id='annees' class='$select_class_annees'>";
    echo "<option value=''>$taxonomy[annees]</option>";
    echo "<option value='date_asc'>A partir des plus récentes</option>";
    echo "<option value='date_desc'>A partir des plus anciennes</option>";
    echo "</select>";
    echo "</div>";
}

echo "</div>"; // Fin de la section droite
echo "</div>"; // Fin du conteneur #filtrePhoto
?>
