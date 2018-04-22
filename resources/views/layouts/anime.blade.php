@extends('layouts.skel')
@section('filter')
<div class="container text-right">
	<img style='width:32px; cursor:pointer' src="{{ asset('images/icon/controls.png') }}" alt="" data-toggle="collapse" data-target="#filter">
	<form id="filter" action="{{ url('/filtro/anime')}} " class="collapse mt-3">
		<button type="submit" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Buscar</button>
		<div class="row text-center">
			<div class="col-lg-4 col-6 mt-3">
				<h3>Genero</h3>
				<div class="row text-left">
					@foreach($genres as $genre)
					<div class="form-check col-sm-4 col-6">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="genre[]" value="{{$genre->genre}}">{{ $genre->genre}}
						</label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 col-6 mt-3">
				<h3>Año</h3>
				<div class="row text-left">
					@foreach($dates->groupBy('year') as $year => $content)
					<div class="form-check col-sm-3 col-6">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="year[]" value="{{$year}}">{{$year}}
						</label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 mt-3">
				<h3>Temporada</h3>
				<div class="row text-left">
					@foreach($dates->groupBy('season') as $season => $content)
					<div class="form-check col-3">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="season[]" value="{{$season}}">
							@switch($season)
								@case('Winter')
									Invierno
									@break
								@case('Spring')
									Primavera
									@break
								@case('Summer')
									Verano
									@break
								@case('Fall')
									Otoño
									@break
							@endswitch
						</label>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
