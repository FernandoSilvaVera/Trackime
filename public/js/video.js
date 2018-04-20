var actual = null

function generateChapter(id){
	actual = id["chapter"]
	$('#video'+actual).append('<iframe src="https://www.rapidvideo.com/e/' + id["video"] + '" sandbox="allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-top-navigation" allowfullscreen="" scrolling="no" frameborder="0"></iframe>')

	$.post(url + 'getComment',{
		'_token': $('meta[name=csrf-token]').attr('content'),
		chapter : actual,
		anime 	: $("#name_anime").text()
	}).done(function(comments){
		for(var i=0; i<comments.length; i++)
			$('#comments'+actual).append('<div class="media mt-4"><img class="d-flex mr-3" style="width:64px" src="'+url+ 'images/user/' + comments[i]["image"] + '.png' + '"/><div class="media-body"><h5 class="mt-0">'+ comments[i]["user"] + '</h5><p>' + comments[i]["comment"] + '</p></div></div>')
	}).fail(function(){
		$('#comments'+actual).append('<p>No se ha podido cargar los comentarios</p>')
	})

}

$(document).ready(function(){
	$('.modal').on('hide.bs.modal', function (e) {
		$('#video'+actual).empty()
		$('#comments'+actual).empty()
	 })
})
