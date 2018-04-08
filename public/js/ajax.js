$(document).ready(function(){
	//Pone la serie como pendiente
	$("#newPending").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"pendiente"
		})
	})

	//Pone la serie como terminada
	$("#newCompleted").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"terminada"
		})
	})

	//borra la serie pendiente/terminada
	$("#destroy").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/destroyAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text()
		})
	})

	//Actualiza la serie a pendiente
	$("#updatePending").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/updateAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"pendiente"
		})
	})

	//Actualiza la serie a completada
	$("#updateCompleted").click(function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/updateAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"terminada"
		})
	})


})
