<?php
/**
 * Modal contact
 *
 * @package WordPress
 * @subpackage nathalie-mota theme
 */
?>

<!-- Ajout d'une popup dans contact -->

<?php
// On récupère les champs ACF nécessaires

?>

<div class="popup-overlay">
		<div class="popup-header">
            <img class="logo" src="<?php echo get_template_directory_uri() . '/assets/img/contact-formulaire.png'; ?> " alt="banniere-contact-formulaire">
		</div>
		<p class="popup-informations"></p>
		<?php
            // On insère le formulaire de demandes de renseignements
            echo do_shortcode('[contact-form-7 id="2186d60" title="Contact"]');
		?>
</div>

