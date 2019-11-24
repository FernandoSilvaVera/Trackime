@extends('layouts.skel')

@section('content')

<div class="container">
	<ul class="nav nav-tabs nav-justified">
		@foreach($genres as $genre)
			@if(strtoupper($genreActually) === strtoupper($genre->genre))
			<li class="nav-item">
				<a class="nav-link active" href="{{ url('/tops/' .  $genre->genre)}}">{{ $genre->genre }}</a>
			</li>
			@else
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/tops/' .  $genre->genre)}}">{{ $genre->genre }}</a>
			</li>
			@endif
		@endforeach
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/tops/' .  'nuevo')}}" data-toggle="modal" data-target="#newTop">+ Nuevo Top</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/tops/' .  'nuevo')}}" data-toggle="modal" data-target="#newAnime">+ Agregar Anime</a>
			</li>
	</ul>
</div>
<div class="container text-right">
    <div class="row text-center mt-3 justify-content-center"> 
		@foreach($userAnimes as $anime)
        <div class="col-lg-4 col-sm-6 col-10 mb-5">
			<div class="card mb-1">
				<a href="{{ url('/animes/') . '/' . $anime->anime }}">
					<img class="card-img-top" src="{{ asset('images/' . $anime->web  ) }}.jpg">
				</a>
			</div>
			<span><b>{{ $anime->anime }}</b></span>
        </div>
		@endforeach
    </div>
	{{ $userAnimes->links()}}
</div>

<!-- Modal -->

<div class="container mb-5">
	<div class="modal fade" id="newTop">
		<div class="modal-dialog">
			<div class="modal-content">
			<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">{{ __('Agregar Nuevo Top') }}</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->

				<div class="modal-body container form-group">
					<label>Nombre del Top</label>
					<input type="text" class="form-control" id="top">
					<br>
					<label>Animes para el Top</label>
					<select multiple class="form-control" id="animes">
						@foreach($animes as $anime)
							<option>{{ $anime->anime }}</option>
						@endforeach
					</select>
				</div>

				<!-- Modal footer -->

				<div class="modal-footer">
					<button type="button" class="btn btn-success new-top" data-dismiss="modal">{{ __('Guardar') }}</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancelar') }}</button>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="container mb-5">
	<div class="modal fade" id="newAnime">
		<div class="modal-dialog">
			<div class="modal-content">
			<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">{{ __('Agregar Animes') }}</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->

				<div class="modal-body container form-group">
					<label>Selecciona el top</label>
					<select class="form-control" id="genres">
						@foreach($genres as $genre)
							<option>{{ $genre->genre }}</option>
						@endforeach
					</select>
					<br>
					<label>Animes para el Top</label>
					<select multiple class="form-control" id="animes">
						@foreach($animes as $anime)
							<option>{{ $anime->anime }}</option>
						@endforeach
					</select>
				</div>

				<!-- Modal footer -->
<!--
				<div class="modal-footer">
					<button type="button" class="btn btn-success new-top" data-dismiss="modal">{{ __('Guardar') }}</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancelar') }}</button>
				</div>
-->
			</div>
		</div>
	</div>
</div>

@endsection
