//Cambia el color de las imagenes al seleccionarlas

var image = null

//Pone un borde a la imagen seleccionada o se lo quita a la anterior
$(document).ready(function(){
	$(".new-image").click(function(){
		$("#"+this.id).toggleClass("imagen-seleccionada")
		$("#"+image).toggleClass("imagen-seleccionada")
		image = this.id
	})
})
