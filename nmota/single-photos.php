<?php
/**
 * The single : ATRICLE UNIQUE PHOTO 
 *
 * @package WordPress
 * @subpackage nmota theme
 */
?>


<!--
get_the_ID() retourne l'identifiant de l'article actuel.
get_the_terms() récupère les termes de la taxonomie 'categorie' associés à l'article actuel.
strtoupper() met en majuscules la chaîne de caractères passée en argument.
get_field() récupère la valeur d'un champ ACF.
get_the_post_thumbnail_url() récupère l'URL de la vignette associée à un article.
get_next_post() récupère l'article suivant.
get_previous_post() récupère l'article précédent.
get_permalink() récupère l'URL d'un article.
esc_html() échappe les caractères spéciaux en HTML.
esc_url() échappe les caractères spéciaux dans une URL.
-->

<?php get_header();;?>


<?php
// On récupère les champs ACF nécessaires
$photoId = get_field('photo');
$reference = get_field('reference');
$refUppercase = strtoupper($reference);
$type = get_field('type');
//taxonomie
$annees_terms = get_the_terms(get_the_ID(), 'annee');
// Vérifie si des termes existent et ne sont pas vides
if ($annees_terms && !is_wp_error($annees_terms)) {
  // Assurez-vous de prendre le premier terme, car un article peut être associé à plusieurs termes
  $annee = $annees_terms[0]->name;
} else {
  // Si aucun terme n'est trouvé, vous pouvez définir une valeur par défaut ou afficher un message d'erreur
  $annee = 'Non défini';
}

$categories = get_the_terms(get_the_ID(), 'categorie');
$formats = get_the_terms(get_the_ID(), 'format');
$FORMATS = $formats ? ucwords($formats[0]->name) : '';

// Définissez les URLs des vignettes pour le post précédent et suivant
$nextPost = get_next_post();
$previousPost = get_previous_post();
$previousThumbnailURL = $previousPost ? get_the_post_thumbnail_url($previousPost->ID, 'thumbnail') : '';
$nextThumbnailURL = $nextPost ? get_the_post_thumbnail_url($nextPost->ID, 'thumbnail') : '';
?>


<section class="cataloguePhotos">
	<div class="galleryPhotos">
		<div class="detailPhoto">

			<div class="containerPhoto">
        <img src="<?php echo esc_url($photoId); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
			</div>

			<div class="photo-info">
        <div class="photo-info--title">
				<h2><?php echo get_the_title(); ?></h2>
        </div>
				<div class="taxo-details">
          <p>RÉFÉRENCES: <?php echo esc_html($refUppercase); ?></p>
          <p>CATÉGORIE: <?php echo esc_html($categories && !is_wp_error($categories) && !empty($categories) ? $categories[0]->name : 'Non défini'); ?></p>
          <p>FORMAT: <?php echo esc_html($FORMATS); ?></p>
          <p>TYPE: <?php echo esc_html($type); ?></p>
          <p>ANNÉE: <?php echo esc_html($annee); ?></p>
        </div>
			</div>
		</div>
	</div>

	<div class="contenairContact">
		<div class="contact">
			<p class="interesser"> Cette photo vous intéresse ? </p>
			<button id="boutonContact" data-reference="<?php echo $REFERENCE; ?>">Contact</button>
		</div>

		<div class="naviguationPhotos">

			<!-- Conteneur pour la miniature -->
			<div class="miniPicture" id="miniPicture">
				<!-- La miniature sera chargée ici par JavaScript -->
			</div>

			<div class="naviguationArrow">
				<?php if (!empty($previousPost)) : ?>
					<img class="arrow arrow-left" src="<?php echo get_theme_file_uri() . '/assets/img/left.png'; ?>" alt="Photo précédente" data-thumbnail-url="<?php echo $previousThumbnailURL; ?>" data-target-url="<?php echo esc_url(get_permalink($previousPost->ID)); ?>">
				<?php endif; ?>

				<?php if (!empty($nextPost)) : ?>
					<img class="arrow arrow-right" src="<?php echo get_theme_file_uri() . '/assets/img/right.png'; ?>" alt="Photo suivante" data-thumbnail-url="<?php echo $nextThumbnailURL; ?>" data-target-url="<?php echo esc_url(get_permalink($nextPost->ID)); ?>">
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>

<section>
  <div class="titleSugest">
    <h2>VOUS AIMEREZ AUSSI</h2>
  </div>
  <div class="similar_photo">
    <?php
    $categories = get_the_terms(get_the_ID(), 'categorie'); // Récupère les catégories de la photo principale

    $args = array(
      'post_type' => 'photo',
      'posts_per_page' => 2,
      'post__not_in' => array(get_the_ID()),
      'tax_query' => array(
        array(
          'taxonomy' => 'categorie',
          'field' => 'id',
          'terms' => $categories ? wp_list_pluck($categories, 'term_id') : array(), // Utilisez les termes de la catégorie principale
        ),
      ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
        $photoId = get_field('photo');
        $reference = get_field('reference');
        $refUppercase = strtoupper($reference);
    ?>
        <!-- Conteneur pour chaque photo similaire -->
        <div class="similar_photo__container">
          <!-- Image de la photo similaire -->
          <img class="similar_photo__img" src="<?php echo esc_url($photoId); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
        </div>
    <?php
      endwhile;
    else :
      // Afficher un message si aucune photo similaire n'est trouvée avec la classe photoNotFound
      echo '<p class="photoNotFound">Pas de photo similaire trouvée pour la catégorie.</p>';
    endif;
    wp_reset_postdata();
    ?>
  </div>

  <button id="toutesLesPhotos" class="bouton">
    <a href="<?php echo home_url(); ?>#containerPhoto">Toutes les photos</a>
  </button>

</section>


<?php get_footer(); ?>