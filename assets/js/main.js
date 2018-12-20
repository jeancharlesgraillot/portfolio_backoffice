// On gère l'affichage du menu responsive pour les écrans inférieurs ou égaux à medium (<992px)

$(".navbar-responsive").toggle();



$(".menu").click(function () {

  $(".navbar-responsive").toggle("slow");

});
