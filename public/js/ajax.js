$(document).ready(function(){
	//Pone la serie como pendiente
	$("#pendiente").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"pendiente"
		})
	})

	//Pone la serie como terminada
	$("#terminada").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"terminada"
		})
	})

})
