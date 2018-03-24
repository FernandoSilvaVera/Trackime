@extends('layouts.skel')

@section('content')
<div class="container text-center">
    <div class="row">
		@foreach($animes as $anime)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
			<div class="card">
				<a href="{{ url('/animes/') . '/' . $anime['anime'] }}">
					<img class="card-img-top" src="{{ asset('images/5.jpg') }}" >
				</a>
				<div class="card-footer">{{$anime['anime']}}</div>
			</div>
        </div>
		@endforeach
    </div>
	{{$animes->links() }}
</div>
@endsection
