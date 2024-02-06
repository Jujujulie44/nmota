<?php
/**
 * Modal contact
 *
 * @package WordPress
 * @subpackage nmota theme
 */
?>

<!-- Ajout de popup dans contact -->

<div class="popup-overlay hidden">

	<div class="popup-contact">
		<div class="popup-title__container">
			<span class="popup-close"></span>
            <img class="popup-img" src="<?php echo get_template_directory_uri() . '/assets/img/contact-formulaire.png'; ?> " alt="contact-formulaire">
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
</div>

