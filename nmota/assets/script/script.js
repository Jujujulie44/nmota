// Code pour fermer la popup 

(function($){
    //FERMETURE POPUP

$('.popup-close').click(function(){
	$(this).parents('.popup-overlay').hide();
})

// BOUTON CONTACT.BNT OUVERTURE 

$('.contact-btn').click(function(e) {
	e.preventDefault();
	$('.popup-overlay').show(); 
})
    
})(jQuery)