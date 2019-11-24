@extends('layouts.skel')

@section('content')

	<div class="container">
		<form class='form-group row text-center' action="{{ url(('updateEmission')) }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success">Actualizar emisión</button>
		</form>
	</div>

	<div class="container text-center">
		<h3 class="mb-4">Add Anime</h3>
			<form class='form-group row text-center' action="{{ url(('saveAnime')) }}" method="post">
				@csrf
				<div class="col-6 mb-4"><input required="required" class="form-control" type="text" placeholder="url animeFLV listado de capitulos" name='animeFLV'></div>
				<div class="col-6 mb-4"><input required="required" class="form-control" type="text" placeholder="url myAnimeList" name='myAnimeList'></div>
				<div class="col-6 mb-4"><input required="required" class="form-control" type="text" placeholder="960/540 <==> 480/270" name='image' ></div>
				<div class="col-12 mb-4"> <button type="submit" class="btn btn-success">Save</button> </div>
			</form>
	</div>

	<div class="container">
		<h4><a style="color:black" href="https://www.google.es/search?q=anime&hl=en&biw=1920&bih=927&tbs=isz:ex,iszw:960,iszh:540&tbm=isch&source=lnt" target="_blank">Imagenes 960/540</a></h4>
		<h4><a style="color:black" href="https://www.google.es/search?q=anime&hl=en&biw=1920&bih=927&tbs=isz:ex,iszw:480,iszh:270&tbm=isch&source=lnt" target="_blank">Imagenes 480/270</a></h4>
		<h4><a style="color:black" href="https://animeflv.net/" target="_blank">AnimeFLV</a></h4>
		<h4><a style="color:black" href="https://myanimelist.net/" target="_blank">MyAnimeList</a></h4>
	</div>

	<br>
	<br>

	@if(isset($anime))
	<div class="container text-center" id= "animes">
		<h3 class="mb-4"><strong>Anime Agregado</strong</h3>
			<div class="col-lg-4 col-md-6 col-xs-12 mb-5">
				<anime-component 
					:genres="{{ $anime->genre }}"
					:anime="{{ $anime }}"
					:image="'{{ $anime->web }}'">
				</anime-component>
			</div>
	</div>
	@endif

@endsection
