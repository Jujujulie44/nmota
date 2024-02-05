<?php
/**
 * Modal contact
 *
 * @package WordPress
 * @subpackage nmota theme
 */
?>

<!-- Ajout de popup dans contact -->

<div class="popup-overlay">

		<div class="popup-contact">
			<div class="popup-container">
            	<img class="img-formulaire" src="<?php echo get_template_directory_uri() . '/assets/img/contact-formulaire.png'; ?> " alt="contact-formulaire">
				<div class="popup-title"></div>
				<div class="popup-title"></div>
			</div>
		</div>

		<div class="popup-informations"></p>
			<?php
				// On insère le formulaire de demandes de renseignements
				// get_field('reference')
				$refPhoto = "";
				if (get_field('reference')) {
				$refPhoto = get_field('reference');
				}; 

				// insertion du formulaire
				echo do_shortcode('[contact-form-7 id="2186d60" title="Contact"]');
			?>
		</div>
</div>

