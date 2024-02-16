/* Affichage Miniature */
console.log("Affichage Miniature : son js est chargé");

(function ($) {

    // Gestion du clic sur la flèche gauche
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

    // Gestion du clic sur le bouton modale-contact
    $(".modale-contact").click(function () {
      var reference = $(this).data("reference");
      console.log("Référence de la photo : " + reference);
      // Vous pouvez maintenant utiliser la référence comme vous le souhaitez
    });
    
})(jQuery);