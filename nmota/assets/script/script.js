
(function($){

	$(".modale-contact").on("click", (event) => {
		event.preventDefault();
		$(".popup-overlay").css("display", "flex");
    });

	$(".popup-overlay").on("click", function(event){
		if (event.target !== this) return; 
		$(".popup-overlay").css("display", "none");
	}); 



	


})(jQuery); 
