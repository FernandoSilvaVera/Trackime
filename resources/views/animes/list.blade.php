@extends('layouts.skel')

@section('content')

<div class="container" id ="animes">

	<h3 class='mb-3 text-center' id="name_anime">{{ $anime->anime }}</h3>

	<div class="row">

		<div class="col-6">
			<anime-chapter-list
				:videos="'{{ $chapters }}'"
				>
			</anime-chapter-list>
		</div>

		<!-- Parte derecha de la pagina-->

        <div class="col-6 text-center">
			<img class="card-img-top col-md-8 mb-1" src="{{ asset('images/' . $anime['web']) }}.jpg">
			<br>
			@foreach($anime->genre as $genre)
				<span class="badge badge-dark">{{ $genre->genre}}</span>
			@endforeach
			<p class="text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			<!-- Marcar como pendiente/terminada-->
			@guest
			@else
			 <div class="text-right" style='cursor:pointer'>
				<add-anime-component
					:initial_anime="'{{ $anime->anime }}'"
					:initial_custom="{{ json_encode($custom) }}"
					>
				</add-anime-component>
			 </div>
			@endguest
		</div>
    </div>
</div>

@endsection
