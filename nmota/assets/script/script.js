
(function($){

	/* Gestin de la modale  */

	$(".modale-contact").on("click", (event) => {
		event.preventDefault();
		//console.log("Clic détecté sur .modale-contact");
		$(".popup-overlay").css("display", "flex");
    });

	$(".popup-overlay").on("click", function(event){
		if (event.target !== this) return;
		//console.log("Clic détecté sur .popup-overlay"); 
		$(".popup-overlay").css("display", "none");
	}); 



	/* TEST click des fleche single-photo */

	$(".arrow-left").click(function () {
		var targetUrl = $(this).data("target-url");
		if (targetUrl) {
		  window.location.href = targetUrl;
		}
	});
  
	  // Gestion du clic sur la flèche droite
	  $(".arrow-right").click(function () {
		var targetUrl = $(this).data("target-url");
		if (targetUrl) {
		  window.location.href = targetUrl;
		}
	});




	/* REcupérer la ref de la photo dans la modale // NE FONCTIONNE PAS  */


	$(function () {
	// Sélectionne les éléments déclencheurs de la modale et l'overlay de la modale
	const boutonContact = $("#boutonContact");
	const openContactLink = $("#menu-item-59");
	const modaleOverlay = $(".popup-overlay");
	const referencePhotoInput = $("#referencePhoto");

	// Variable pour stocker la référence
	let referenceValue = "";

	// Fonction pour ouvrir la modale
	function openModal(reference) {
		// Remplit le champ de référence dans le formulaire avec la référence de la photo
		referencePhotoInput.val(reference.toUpperCase());

		modaleOverlay.css("display", "flex");
	}

	// Fonction pour fermer la modale
	function closeModal() {
		modaleOverlay.css("display", "none");

		// Réinitialise la référence après la fermeture de la modale
		referenceValue = "";
	}

	// Ajoute un gestionnaire d'événement au clic sur le bouton de contact (s'il existe)
	if (boutonContact.length) {
		boutonContact.on("click", function (event) {
		event.preventDefault();
		// Récupère la référence seulement si le bouton est cliqué
		referenceValue = boutonContact.data("reference");
		openModal(referenceValue);
		});
	}

	// Ajoute un gestionnaire d'événement au clic sur le lien de contact dans la navbar
	openContactLink.on("click", function (event) {
		event.preventDefault();
		// Ne définissez pas la référence pour que le champ reste vide
		openModal("");
	});

	// Ajoute un gestionnaire d'événement au clic sur la fenêtre
	$(window).on("click", function (event) {
		// Vérifie si l'élément cliqué est l'overlay de la modale
		if ($(event.target).is(modaleOverlay)) {
		closeModal();
		}
	});
	});


})(jQuery); 
