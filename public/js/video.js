var actual = null

function generateChapter(id){
	actual = id["chapter"]
	$('#video'+actual).append('<iframe src="https://www.rapidvideo.com/e/' + id["video"] + '" sandbox="allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-top-navigation" allowfullscreen="" scrolling="no" frameborder="0"></iframe>')
}

$(document).ready(function(){
	$('.modal').on('hide.bs.modal', function (e) {
		$('#video'+actual).empty()
	 })
})
