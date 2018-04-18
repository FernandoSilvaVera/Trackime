@extends('layouts.anime')

@section('content')
<div class="container text-right">
    <div class="row text-center mt-3 justify-content-center"> 
		@foreach($animes as $anime)
        <div class="col-lg-4 col-sm-6 col-10 mb-5">
			<div class="card mb-1">
				<a href="{{ url('/animes/') . '/' . $anime->anime }}">
					<img class="card-img-top" src="{{ asset('images/' . $anime->image($anime->anime)  ) }}.jpg">
				</a>
			</div>
			<span><b>{{ $anime->anime }}</b></span>
			<div class="text-center">
				@foreach($anime->genre as $genre)
				<span class="badge badge-dark">{{ $genre->genre }}</span>
				@endforeach
			</div>
        </div>
		@endforeach
    </div>
	{{ $animes->links()}}
</div>
@endsection
