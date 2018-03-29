@extends('layouts.character')

@section('content')
<div class="container">
    <div class="row text-center mt-3">
		@foreach($characters as $character)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
			<div class="card">
				<a href="{{ url('/personajes/') . '/' . $character->name }}">
					<img class="card-img-top" src="{{ asset('images/' . $character->name) }}.jpg">
				</a>
				<div class="card-footer" style="background-color:#ffffff">
					<h4>{{$character->name}}</h4>
				</div>
			</div>
        </div>
		@endforeach
    </div>
</div>
@endsection
