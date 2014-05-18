//Fonction chargée lors du lancement de la page
$(window).ready(function(){
    //chargement du circular slider
    $('#ca-container').contentcarousel();
    //ajout des datepickers sur les champs date
    var myDatePicker = $('.date-form').datepicker({
				format: 'dd-mm-yyyy'
			});
});