(function($){

	/************ Gestion OUVERTURE/ FERMETURE  de la modale  **************/

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





	/***************** REcupérer la REF-PHOTO  Du BTNcontact vers la modale **********/

	const modaleOverlay = $(".popup-overlay");

	// Ajoute un gestionnaire d'événement au clic sur la fenêtre
	$(window).on("click", function (event) {
		// Vérifie si l'élément cliqué est l'overlay de la modale
		if ($(event.target).is(modaleOverlay)) {
		closeModal();
		}
	});

	// Fonction pour ouvrir la modale
	function openModal() {
		modaleOverlay.css("display", "flex");
	}

	// Fonction pour fermer la modale
	function closeModal() {
		modaleOverlay.css("display", "none");
	}


	$(".modale-contact").on("click", function (event){
		event.preventDefault();
		$("#referencePhoto").val($('#single-ref').html());
		openModal();
	})


})(jQuery); 