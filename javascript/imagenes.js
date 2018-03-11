//Cambia el color de las imagenes al seleccionarlas

var anterior = null

//Pone un borde a la imagen seleccionada o se lo quita a la anterior
$(document).ready(function(){
    $(".nueva-imagen").click(function(){
		$("#"+this.id).toggleClass("imagen-seleccionada")
		$("#"+anterior).toggleClass("imagen-seleccionada")
		anterior = this.id
    })
})

//Cambia la imagen en la bbdd
$(document).ready(function(){
    $(".cambiar-imagen").click(function(){
		$.get("../controlador/imagen.php",{imagen:anterior}, function(respuesta){

		})
    })
})


