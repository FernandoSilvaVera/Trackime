@extends('layouts.anime')

@section('content')
<div class="container">
    <div class="row text-center mt-3 justify-content-center">
		@foreach($animes as $anime)
        <div class="col-lg-4 col-sm-6 col-10 mb-5">
			<div class="card mb-1">
				<a href="{{ url('/animes/') . '/' . $anime->anime }}">
					<img class="card-img-top" src="{{ asset('images/' . $anime->web) }}.jpg">
				</a>
			</div>
			<span><b>{{ $anime->anime }}</b></span>
        </div>
		@endforeach
    </div>
</div>
@endsection
