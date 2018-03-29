@extends('layouts.anime')

@section('content')
<div class="container text-right">
    <div class="row text-center mt-3">
		@foreach($animes as $anime)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
			<div class="card">
				<a href="{{ url('/animes/') . '/' . $anime->anime }}">
					<img class="card-img-top" src="{{ asset('images/' . $anime->image($anime->anime)  ) }}.jpg">
				</a>
				<div class="card-footer" style="background-color:#ffffff">
					<h4>{{$anime->anime}}</h4>
					<div class="text-left">
						@foreach($anime->genre as $genre)
						<span class="badge badge-dark">{{ $genre->genre }}</span>
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
