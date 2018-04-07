@extends('layouts.skel')

@section('content')
<div class="container">

	<div class="row">

		<div class="col-6">
			<h3 class="text-center">Listado de capitulos</h3>
			<div class="col-12" style="overflow:auto;height:300px">
				<table class="table table-hover" >
					<tbody>
						@for($chapter=count($video); $chapter>0; $chapter--)
							<tr style="cursor:pointer;">
								<td data-toggle="modal" data-target="#{{ $chapter }}">{{ $anime->anime }}</td>
								<td data-toggle="modal" data-target="#{{ $chapter }}">{{ $chapter }}</td>
								<div class="modal fade" id="{{ $chapter }}">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">

											<div class="modal-header">
												<h3 class="modal-title">{{ $anime->anime . __(' - Capitulo - ') . $chapter }}</h3>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<div class="modal-body">
												<div class="embed-responsive embed-responsive-16by9">
													@if($video[$chapter-1]->video !== 'pending')
													<iframe src="https://www.rapidvideo.com/e/{{ $video[$chapter-1]->video }}" allowfullscreen="" scrolling="no" frameborder="0"></iframe>
													{{--
													<video controls="controls" type="video/mp4" preload="none">
														<source src="{{url('/video/') . '/' . $video[$chapter-1]->anime . '/' . $video[$chapter-1]->chapter}}"  autostart="false">
													</video>--}}
													@else
														<h3>Video no disponible</h3>
													@endif
												</div>
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>

										</div>
									</div>
								</div>

							</tr>
						@endfor
					</tbody>
				</table>
			</div>
		</div>

		<!-- Parte derecha de la pagina-->

        <div class="col-6 text-center">
			<h3 id="name_anime">{{ $anime->anime }}</h3>
			<img class="card-img-top col-md-8 mb-1" src="{{ asset('images/' . $anime['web']) }}.jpg">
			<br>
			@foreach($anime->genre as $genre)
				<span class="badge badge-dark">{{ $genre->genre}}</span>
			@endforeach
			<p class="text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

			<!-- Marcar como pendiente/terminada-->
			@guest
			@else
			 <div class="text-right">
				<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Agregar</button>

				<div class="dropdown-menu">
					<a id="pendiente" class="dropdown-item">como pendiente</a>
					<a id="terminada" class="dropdown-item">como terminada</a>
				</div>
			 </div>
			@endguest
		</div>
    </div>
</div>

<div class="container mt-5">
	<h3 class="text-center">Personajes</h3>
	<div class="row">
	@foreach($anime->character as $character)
        <div class="col-md-3 col-6">
			<div class="card mb-5">
				<a href="{{ url('/personajes/') . '/' . $character->name }}">
					<img class="card-img-top" src="https://static.zerochan.net/Izumi.Sagiri.full.2140480.jpg">
				</a>
				<div class="card-footer text-center" style="background-color:#ffffff">
					{{$character->name}}<br>
					<div class="text-left">
					@foreach($anime->genre as $genre)
						<span class="badge badge-dark">{{ $genre['genre'] }}</span>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</div>

<div class="container mt-5">
	<h3 class="text-center">Series Relacionadas</h3>
</div>

@endsection
