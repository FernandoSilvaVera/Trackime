@extends('layouts.skel')

@section('content')
<div class="container text-right">
	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Filtro</button>
	<div id="demo" class="collapse mt-3">
	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Limpiar</button>
	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Buscar</button>
		<div class="row text-center">
			<div class="col-lg-4 col-6 mt-3">
				<h3>Genero</h3>
				<form class="row text-left">
				@foreach($genres as $genre)
					<div class="form-check col-sm-4 col-6">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" value="">{{ $genre->genre}}
						</label>
					</div>
				@endforeach
				</form>
			</div>
			<div class="col-lg-4 col-6 mt-3">
				<h3>Año</h3>
				<form class="row text-left">
				@foreach($dates->groupBy('year') as $year => $content)
					<div class="form-check col-sm-3 col-6">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" value="">{{$year}}
						</label>
					</div>
				@endforeach
				</form>
			</div>
			<div class="col-lg-4 mt-3">
				<h3>Temporada</h3>
				<form class="row text-left">
				@foreach($dates->groupBy('season') as $season => $content)
					<div class="form-check col-3">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" value="">{{$season}}
						</label>
					</div>
				@endforeach
				</form>
			</div>
		</div>
	</div>
    <div class="row text-center mt-3">
		@foreach($animes as $anime)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
			<div class="card">
				<a href="{{ url('/animes/') . '/' . $anime['anime'] }}">
					<img class="card-img-top" src="{{ asset('images/' . $anime['web']) }}.jpg">
				</a>
				<div class="card-footer" style="background-color:#ffffff">
					{{$anime['anime']}}<br>
					<div class="text-left">
					@foreach($anime->genre as $genre)
						<span class="badge badge-dark">{{ $genre['genre'] }}</span>
					@endforeach
					</div>
				</div>
			</div>
        </div>
		@endforeach
    </div>
	{{ $animes->links()}}
</div>
@endsection
