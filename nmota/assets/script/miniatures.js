(function($){

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


})(jQuery); 