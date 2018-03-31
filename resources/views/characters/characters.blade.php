@extends('layouts.character')

@section('content')
<div class="container text-right">
	<div class="row text-center mt-3">
		@foreach($characters as $character)
			<div class="col-lg-3 col-4">
				<div class="card mb-5">
					<a href="{{ url('/personajes/') . '/' . $character->name }}">
						<img class="card-img-top" src="{{ asset('images/character/' . $character->web) }}.jpg">
					</a>
					<div class="card-footer text-center" style="background-color:#ffffff">
						{{$character->name}}<br>
						<div class="text-left">
							<span class="badge badge-dark">Yundere</span>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	{{ $characters->links() }}
</div>
@endsection
