//Inspecciona la url para obtener su valor
//ej ==> www.algo.com?valor=ejemplo
$.urlParam = function(parametro){
	var results = new RegExp('[\?&]' + parametro + '=([^&#]*)').exec(window.location.href)
	return decodeURI(results[1])
}

$(document).ready(function(){
    $("#agregar").click(function(){
	$.get("../controlador/agregar.php",{serie:$.urlParam('anime')}, function(respuesta){
		//TODO -->Cambiar icono de agregar
	})
    })
})
