
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
  
/* TEST1
	  // Gestion du clic sur le bouton modale-contact
	  $(".modale-contact").click(function () {
		const reference = $(this).data("reference");
		console.log("Référence de la photo : " + reference);
		// Vous pouvez maintenant utiliser la référence comme vous le souhaitez
	  });

*/

	  document.addEventListener("DOMContentLoaded", function() {
		// Gestion du clic sur le bouton modale-contact
		$(".modale-contact").click(function () {
			const reference = $(this).data("reference");
			console.log("Référence de la photo : " + reference);
			// Vous pouvez maintenant utiliser la référence comme vous le souhaitez
		});
	});


	
})(jQuery); 
