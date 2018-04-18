@extends('layouts.skel')

@section('content')
<div class="container text-right">
    <div class="row text-center mt-3 justify-content-center">
		@foreach($animes as $anime)
        <div class="col-lg-4 col-6 mb-5">
			<div class="card">
				<a href="{{ url('/animes/') . '/' . $anime->anime }}">
					<img class="card-img-top" src="{{ asset('images/' . $anime->image()  ) }}.jpg">
				</a>
			</div>
			<span><b>{{ $anime->anime }}</b></span>
			<span><b>capitulo {{ $anime->chapter }}</b></span>
        </div>
		@endforeach
    </div>

</div>
@endsection
