@extends('layouts.anime')

@section('content')

<div id="animes" class="container text-right">
    <div class="row text-center mt-3 justify-content-center"> 
		@foreach($animes as $anime)
			<anime-component 
				:genres="{{ $anime->genre }}"
				:anime="{{ $anime }}"
				:image="'{{ $anime->image() }}'">
			</anime-component>
		@endforeach
    </div>
	{{ $animes->links()}}
</div>
@endsection
