var url = 'http://' + $(location).attr('host') + '/Trackime/public/';

$(document).ready(function(){
	//Pone la serie como pendiente
	$(document).on('click','#newPending', function(){
		$.post(url + 'agregarSerie',{
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
		$.post(url + 'agregarSerie',{
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
		$.post(url + 'destroyAnime',{
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
		$.post(url + 'updateAnime',{
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
		$.post(url + 'updateAnime',{
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
	$(document).on('click', '.cambiar-imagen', function(){
		$.post(url + 'updateImage',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			image: image
		}).done(function(){
			$('#userImage').remove()
			$('#infoUser').append('<img id="userImage" src=' + url + 'images/user/' + image + '.png class="img-thumbnail mb-2" data-toggle="modal" data-target="#changeImage">')
		}).fail(function(){
			alert("No se ha podido cambiar la imagen")
		})
	})

	//Agregar el comentario en la bbdd
	$(document).on('click', '.comment', function(){
		var comment = $('#commentary' + this.name).val()
		var chapter = this.name
		$.post(url + 'addComment',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			comment : comment,
			chapter : chapter,
			anime	: $("#name_anime").text()
		}).done(function(user){
			$('#comments'+chapter).append('<div class="media mt-4"><img class="d-flex mr-3" style="width:64px" src="'+url+ 'images/user/' + user["image"] + '.png' + '"/><div class="media-body"><h5 class="mt-0">'+ user["name"] + '</h5><p>'+comment+'</p></div></div>')
		}).fail(function(){
			alert("No se ha podido escribir el comentario")
		})
	})

})
