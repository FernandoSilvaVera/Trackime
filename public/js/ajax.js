$(document).ready(function(){
	//Pone la serie como pendiente
	$(document).on('click','#newPending', function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"pendiente"
		}).done(function(){
			$('#add').remove()
			$('#options').append('<div id="pending"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Pendiente</button><div class="dropdown-menu"><a id="destroy" class="dropdown-item">quitar pendiente</a><a id="updateCompleted" class="dropdown-item">marcar terminada</a></div></div>')
		})
	})

	//Pone la serie como terminada
	$(document).on('click', '#newCompleted', function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"terminada"
		}).done(function(){
			$('#add').remove()
			$('#options').append('<div id="completed"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Terminada</button><div class="dropdown-menu"><a id="destroy" class="dropdown-item">quitar terminada</a><a id="updatePending" class="dropdown-item">marcar pendiente</a></div></div>')
		})
	})

	//borra la serie pendiente/terminada
	$(document).on('click', '#destroy', function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/destroyAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text()
		}).done(function(){
			$('#pending').remove()
			$('#completed').remove()
			$('#options').append('<div id="add"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Agregar</button><div class="dropdown-menu"><a id="newPending" class="dropdown-item">marcar pendiente</a><a id="newCompleted" class="dropdown-item">marcar terminada</a></div></div>')

		})
	})

	//Actualiza la serie a pendiente
	$(document).on('click', '#updatePending', function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/updateAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"pendiente"
		}).done(function(){
			$('#pending').remove()
			$('#completed').remove()
			$('#options').append('<div id="pending"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Pendiente</button><div class="dropdown-menu"><a id="destroy" class="dropdown-item">quitar pendiente</a><a id="updateCompleted" class="dropdown-item">marcar terminada</a></div></div>')
		})
	})

	//Actualiza la serie a completada
	$(document).on('click', '#updateCompleted', function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/updateAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	$("#name_anime").text(),
			state:	"terminada"
		}).done(function(){
			$('#pending').remove()
			$('#completed').remove()
			$('#options').append('<div id="completed"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Terminada</button><div class="dropdown-menu"><a id="destroy" class="dropdown-item">quitar terminada</a><a id="updatePending" class="dropdown-item">marcar pendiente</a></div></div>')
		})
	})

	//Cambia la imagen en la bbdd
	$(document).on('click' ,'.cambiar-imagen', function(){
		$.post('http://' + $(location).attr('host') + '/Trackime/public/updateImage',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			image: image
		}).done(function(){
			$('#userImage').remove()
			$('#infoUser').append('<img id="userImage" src="http://' + $(location).attr('host') + '/Trackime/public/images/user/' + image + '.png" class="img-thumbnail mb-2" data-toggle="modal" data-target="#changeImage">')
		}).fail(function(){
			alert("No se ha podido cambiar la imagen")
		})
	})

})
