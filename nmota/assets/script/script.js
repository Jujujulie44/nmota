
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




	/* Click des fleche  / miniatures single-photo */

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




	/* REcupérer la ref de la photo Du BTN contact vers la modale */


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



	/********* Lightbox fullscreen   ******/


	// Fonction principale exécutée lorsque le DOM est prêt
	$(function () {
	// Sélection des éléments du DOM nécessaires
	const $lightbox = $("#lightbox");
	const $lightboxImage = $(".lightboxImage");
	const $lightboxCategory = $(".lightboxCategorie");
	const $lightboxReference = $(".lightboxReference");
	let currentIndex = 0; // Indice de l'image actuellement affichée dans la lightbox

	// Fonction pour mettre à jour le contenu de la lightbox en fonction de l'index de l'image
	function updateLightbox(index) {
		const $images = $(".fullscreen-icon");
		const $image = $images.eq(index);

		// Récupération des données associées à l'image
		const categoryText = $image.data("category").toUpperCase();
		const referenceText = $image.data("reference").toUpperCase();

		// Mise à jour des éléments de la lightbox avec les nouvelles données
		$lightboxImage.attr("src", $image.data("full"));
		$lightboxCategory.text(categoryText);
		$lightboxReference.text(referenceText);
		currentIndex = index;
	}

	// Fonction pour ouvrir la lightbox avec une image spécifique (index)
	function openLightbox(index) {
		updateLightbox(index);
		$lightbox.show();
	}

	// Fonction pour fermer la lightbox
	function closeLightbox() {
		$lightbox.hide();
	}

	// Fonction pour attacher les événements aux images
	window.attachEventsToImages = function () {
		const $images = $(".fullscreen-icon");
		$images.off("click", imageClickHandler);
		$images.on("click", imageClickHandler);
	};

	// Gestionnaire d'événement pour le clic sur une image
	function imageClickHandler() {
		const $images = $(".fullscreen-icon");
		const index = $images.index($(this).closest(".fullscreen-icon"));
		openLightbox(index);
	}

	// Attachement des événements aux images lors du chargement initial
	attachEventsToImages();

	// Gestionnaire d'événement pour le clic sur le bouton de fermeture
	$(".lightboxClose").on("click", closeLightbox);

	// Gestionnaire d'événement pour le clic sur le bouton précédent
	$(".lightboxPrevious").on("click", function () {
		const $images = $(".fullscreen-icon");
		currentIndex = currentIndex > 0 ? currentIndex - 1 : $images.length - 1;
		updateLightbox(currentIndex);
	});

	// Gestionnaire d'événement pour le clic sur le bouton suivant
	$(".lightboxNext").on("click", function () {
		const $images = $(".fullscreen-icon");
		currentIndex = currentIndex < $images.length - 1 ? currentIndex + 1 : 0;
		updateLightbox(currentIndex);
	});
	});



})(jQuery); 
