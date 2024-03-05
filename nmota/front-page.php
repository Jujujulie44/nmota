<?php get_header();?>

<!-- Bloc pour le chargement de la banniere et du titre -->
<?php get_template_part('template-parts/banner'); ?>

<!-- Bloc pour le chargement des filtres -->
<?php get_template_part('template-parts/filtres'); ?>

<!-- Bloc pour le chargement Pour la section photos -->
<section id="containerPhoto" class="blocCatalogue">
  <?php get_template_part('template-parts/section-photo'); ?>
</section>

<!-- Bloc pour le chargement de plus de photos -->
<div id="load-moreContainer">
    <button id="btnLoad-more"  data-offset= "8" data-url="">Charger plus</button>
</div>


<?php get_footer();?>