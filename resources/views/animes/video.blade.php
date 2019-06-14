@extends('layouts.skel')

@section('content')

<div class="container">

	<h3 class='text-center' id="name_anime">{{ $anime . ' '  . $chapter }}</h3>

	<div class="row">
		<div class="col-12" style="overflow:auto;">
			<div id="video{{ $chapter}}" class="embed-responsive embed-responsive-16by9 mb-2">
				<iframe 
					src="https://www.rapidvideo.com/e/{{ $video }}" 
					sandbox="allow-forms allow-pointer-lock allow-same-origin allow-top-navigation"
					allowfullscreen="" 
					scrolling="no" 
					frameborder="0">
				</iframe>
			</div>
		</div>
    </div>

	<div class="row text-center">

		@if ($anterior)
		<a href=" {{ url('/ver') . '?' . 'anime=' . $anterior->anime . '&capitulo=' . $anterior->chapter}}" class="col-4" style="cursor:pointer;">
				<img style="width:32px;" src="{{ asset('images/icon/anterior.png') }}"/>
		</a>
		@else
		<div class="col-4"></div>
		@endif

		<a href="  {{  url('/animes') . '/' . $anime }}  " class="col-4" style="cursor:pointer;">
				<img style="width:32px;" src="{{ asset('images/icon/capitulos.svg') }}"/>
		</a>
		@if ($siguiente)
		<a href=" {{ url('/ver') . '?' . 'anime=' . $siguiente->anime . '&capitulo=' . $siguiente->chapter}}" class="col-4" style="cursor:pointer;">
			<img style="width:32px;" src="{{ asset('images/icon/siguiente.png') }}"/>
		</div>
		@else
			<div class="col-4"></div>
		@endif
	</div>


	@if(Auth::user() and Auth::user()->admin)
		<a href="{{ url('/deleteAnime/') . '/' . $anime }}" class="btn btn-dark"> Eliminar Anime </a>
		<a href="{{ url('/deleteChapter/') . '/' . $anime . '/' . $chapter}}" class="btn btn-dark"> Eliminar Capitulo </a>
		<a href="{{ url('/delete/') . '/' . $anime }}" class="btn btn-dark"> Editar </a>
	@endif


</div>

@endsection
