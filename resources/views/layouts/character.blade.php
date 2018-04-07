@extends('layouts.skel')
@section('filter')
<div class="container text-right">
	<button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Filtro</button>
	<form id="demo" action="{{ url('/filtro/personaje')}} " class="collapse mt-3">
		<button type="submit" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Buscar</button>
		<div class="row text-center">
			<div class="col-lg-4 col-6 mt-3">
				<h3>Personalidad</h3>
				<div class="row text-left">
					@foreach($personalities as $p)
					<div class="form-check col-md-4 col-6">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="personality[]" value="{{ $p->personality }}">{{ $p->personality }} 
						</label>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-lg-4 col-6 mt-3">
				<h3>Pelo</h3>
				<div class="row text-left">
					@foreach($hairs as $hair)
					<div class="form-check col-md-4 col-6">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="hair[]" value="{{ $hair->hair }}">{{ $hair->hair }} 
						</label>
					</div>
					@endforeach
				</div>
			</div>

			<div class="col-lg-4 col-12 mt-3">
				<h3>Personaje</h3>
				<div class="row text-center">
					<div class="form-check col-4">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="sex[]" value="Hombre">Hombre
						</label>
					</div>
					<div class="form-check col-4">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="sex[]" value="Mujer">Mujer
						</label>
					</div>
					<div class="form-check col-4">
						<label class="form-check-label ml-3">
							<input type="checkbox" class="form-check-input" name="loli" value="true">loli
						</label>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
