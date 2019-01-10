var url = 'http://' + $(location).attr('host') + '/';

function is_list(){
    return document.location.pathname.includes("animes");
}

$(document).ready(function(){
	//Pone la serie como pendiente
	$(document).on('click','#newPending', function(){
		var anime = this.name
		$.post(url + 'agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	anime,
			state:	"pendiente"
		}).done(function(){
			$('#add').remove()
			$('#options').append('<div id="pending"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Pendiente</button><div class="dropdown-menu"><a id="destroy" name="'+anime+'"class="dropdown-item">quitar pendiente</a><a id="updateCompleted" name="'+anime+'"class="dropdown-item">marcar terminada</a></div></div>')
		})
	})

	//Pone la serie como terminada
	$(document).on('click', '#newCompleted', function(){
		var anime = this.name
		$.post(url + 'agregarSerie',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	anime,
			state:	"terminada"
		}).done(function(){
			$('#add').remove()
			$('#options').append('<div id="completed"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Terminada</button><div class="dropdown-menu"><a id="destroy" name="'+anime+'"class="dropdown-item">quitar terminada</a><a id="updatePending" name="'+anime+'" class="dropdown-item">marcar pendiente</a></div></div>')
		})
	})

	//borra la serie pendiente/terminada
	$(document).on('click', '#destroy', function(){
		var anime	= this.name
		var id		= $(this).parent().parent().parent().parent().attr('id')
		$.post(url + 'destroyAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	anime
		}).done(function(){
			if(is_list()){
				$('#pending').remove()
				$('#completed').remove()
			}else
				$('#'+id).remove()
			$('#options').append('<div id="add"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Agregar</button><div class="dropdown-menu"><a id="newPending" name="'+anime+'"class="dropdown-item">marcar pendiente</a><a id="newCompleted" name="'+anime+'"class="dropdown-item">marcar terminada</a></div></div>')

		})
	})

	//Actualiza la serie a pendiente
	$(document).on('click', '#updatePending', function(){
		var anime = this.name
		var id		= $(this).parent().parent().parent().parent().attr('id')
		$.post(url + 'updateAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	anime,
			state:	"pendiente"
		}).done(function(){
			if(is_list()){
			$('#pending').remove()
			$('#completed').remove()
			}else
				$('#'+id).remove()
			$('#options').append('<div id="pending"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Pendientes</button><div class="dropdown-menu"><a id="destroy" name="'+ anime + '" class="dropdown-item">quitar pendiente</a><a id="updateCompleted" name="'+ anime +'"class="dropdown-item">marcar terminada</a></div></div>')
		})
	})

	//Actualiza la serie a completada
	$(document).on('click', '#updateCompleted', function(){
		var anime = this.name
		var id		= $(this).parent().parent().parent().parent().attr('id')
		$.post(url + 'updateAnime',{
			'_token': $('meta[name=csrf-token]').attr('content'),
			anime:	anime,
			state:	"terminada"
		}).done(function(){
			if(is_list()){
				$('#pending').remove()
				$('#completed').remove()
			}else
				$('#'+id).remove()
			$('#options').append('<div id="completed"><button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Terminada</button><div class="dropdown-menu"><a id="destroy" name="'+anime+'"class="dropdown-item">quitar terminada</a><a id="updatePending" name="'+anime+'"class="dropdown-item">marcar pendiente</a></div></div>')
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
			anime	: $('#name_anime').text()
		}).done(function(user){
			$('#comments'+chapter).append('<div class="media mt-4"><img class="d-flex mr-3" style="width:64px" src="'+url+ 'images/user/' + user["image"] + '.png' + '"/><div class="media-body"><h5 class="mt-0">'+ user["name"] + '</h5><p>'+comment+'</p></div></div>')
		}).fail(function(){
			alert("No se ha podido escribir el comentario")
		})
	})

	$(document).on('click', '.download-anime', function(){
		$.post(url + 'downloadChapter',{
			'_token' : $('meta[name=csrf-token]').attr('content'),
			animeFLV : $(this).parent().attr('id'),
			chapter  : this.name
		}).done(function(link){
			window.location = link;
		}).fail(function(){
			alert("No se puede descargar este capítulo")
		})
	})
	
})
