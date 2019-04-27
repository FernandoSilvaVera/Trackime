@extends('layouts.skel')

@section('content')

<div class="container">

	<h3 class='text-center' id="name_anime">{{ $anime . ' '  . $chapter }}</h3>

	<div class="row">
		<div class="col-12" style="overflow:auto;">
			<div id="video{{ $chapter}}" class="embed-responsive embed-responsive-16by9 mb-2">
				<iframe 
					src="https://www.rapidvideo.com/e/{{ $video }}" 
					sandbox="allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-top-navigation" 
					allowfullscreen="" 
					scrolling="no" 
					frameborder="0">
				</iframe>
			</div>
		</div>
    </div>
	@if(Auth::user() and Auth::user()->admin)
		<a href="{{ url('/deleteAnime/') . '/' . $anime }}" class="btn btn-dark"> Eliminar Anime </a>
		<a href="{{ url('/deleteChapter/') . '/' . $anime . '/' . $chapter}}" class="btn btn-dark"> Eliminar Capitulo </a>
		<a href="{{ url('/delete/') . '/' . $anime }}" class="btn btn-dark"> Editar </a>
	@endif


</div>

@endsection
