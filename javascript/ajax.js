//Inspecciona la url para obtener su valor
//ej ==> www.algo.com?valor=ejemplo
$.request = function(parametro){
	var results = new RegExp('[\?&]' + parametro + '=([^&#]*)').exec(window.location.href)
	return decodeURI(results[1])
}


$(document).ready(function(){

	//Marca la serie como pendiente
    $("#pendiente").click(function(){
		$.get("../controlador/agregar.php",{serie:$.request('anime'),estado:"pendiente"}, function(respuesta){
			//TODO -->Cambiar icono de agregar
		})
    })

	//Marca la serie como terminada
    $("#terminada").click(function(){
		$.get("../controlador/agregar.php",{serie:$.request('anime'),estado:"terminada"}, function(respuesta){
			//TODO -->Cambiar icono de agregar
		})
    })

	//Escribe el comentario en la bbdd
    $("#comentar").click(function(){
		$.get("../controlador/comentar.php",{serie:$.request('anime'),capitulo:$.request('cap'),comentario:$('#comentario').val()}, function(respuesta){
			//TODO
		})
    })

	//Redirige a la vista de capitulos desde la página de busqueda
    $(".descripcion").click(function(){
		window.location.href = '/Trackime/vista/capitulos.php?id=' + this.id;
    })

	//Redirige a la vista de perfil desde la página de busqueda
    $(".perfil").click(function(){
		window.location.href = '/Trackime/vista/perfil?usuario=' + this.id;
    })

	//Sigue a un usuario
    $(".seguir").click(function(){
		$.get("../controlador/seguir.php",{usuario:$.request('usuario')}, function(respuesta){
			//TODO
		})
    })




})


