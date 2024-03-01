<?php get_header();?>

<?php get_template_part('template-parts/banner'); ?>

<?php get_template_part('template-parts/filtres'); ?>

<section id="containerPhoto" class="blocCatalogue">
  <?php get_template_part('template-parts/section-photo'); ?>
</section>

<!-- Bloc pour le chargement de plus de photos -->
<div id="load-moreContainer">
    <button id="btnLoad-more"  data-offset= "8" data-url="">Charger plus</button>
</div>


<?php get_footer();?>