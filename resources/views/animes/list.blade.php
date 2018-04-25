@extends('layouts.skel')

@section('content')

<div class="container">

	<h3 class='mb-3 text-center' id="name_anime">{{ $anime->anime }}</h3>

	<div class="row">

		<div class="col-6">
			<div class="col-12" style="overflow:auto;height:300px">
				<table class="table table-hover" >
					<tbody>
						@for($chapter=count($video); $chapter>0; $chapter--)
							<tr style="cursor:pointer;">
								<td onclick="generateChapter({{ $video[$chapter-1] }})" data-toggle="modal" data-target="#{{ $chapter }}">{{ $anime->anime }}</td>
								<td onclick="generateChapter({{ $video[$chapter-1] }})" data-toggle="modal" data-target="#{{ $chapter }}">{{ $chapter }}</td>
								<div class="modal fade" id="{{ $chapter }}">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">

											<div class="modal-header">
												<h3 class="modal-title">{{ $anime->anime . __(' - Capitulo - ') . $chapter }}</h3>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<div class="modal-body">
												<div id="video{{ $chapter}}" class="embed-responsive embed-responsive-16by9 mb-2">
													@if($video[$chapter-1]->video !== 'pending')

													{{--
													<video controls="controls" type="video/mp4" preload="none">
														<source src="{{url('/video/') . '/' . $video[$chapter-1]->anime . '/' . $video[$chapter-1]->chapter}}"  autostart="false">
													</video>--}}
													@else
														<h3>Video no disponible</h3>
													@endif
												</div>
												<div class="container mt-5">
													<div class="text-right mb-3" id="{{ $video[$chapter-1]->web() }}">
														<img src="{{ asset('images/icon/download.png') }}" name="{{ $video[$chapter-1]->chapter }}" class='download-anime' style="width:32px;cursor:pointer" alt="">
													</div>
													@guest
													@else
													<div class="form-group mb-5">
														<label for="exampleTextarea">Escribe un comentario</label>
														<textarea class="form-control" id="commentary{{$chapter}}" maxlength="255" rows="3"></textarea>
														<br>
														<button type="submit" name='{{ $chapter }}' class="btn btn-primary float-right comment">Comentar</button>
													</div>
													@endguest
													<div id='comments{{$chapter}}' class="mt-5">

													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
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

			<img class="card-img-top col-md-8 mb-1" src="{{ asset('images/' . $anime['web']) }}.jpg">
			<br>
			@foreach($anime->genre as $genre)
				<span class="badge badge-dark">{{ $genre->genre}}</span>
			@endforeach
			<p class="text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

			<!-- Marcar como pendiente/terminada-->
			@guest
			@else
			 <div id='options' class="text-right" style='cursor:pointer'>
	
				@if(is_null($custom))
						<div id="add">
							<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Agregar</button>
							<div class="dropdown-menu">
								<a id="newPending" name="{{ $anime->anime }}" class="dropdown-item">marcar pendiente</a>
								<a id="newCompleted" name="{{ $anime->anime }}" class="dropdown-item">marcar terminada</a>
							</div>
						</div>
				@elseif($custom->state === 'pendiente')
						<div id="pending">
							<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Pendiente</button>
							<div class="dropdown-menu">
								<a id="destroy" name="{{ $anime->anime }}"class="dropdown-item">quitar pendiente</a>
								<a id="updateCompleted" name="{{ $anime->anime }}" class="dropdown-item">marcar terminada</a>
							</div>
						</div>
				@elseif($custom->state === 'terminada')
						<div id="completed">
							<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Terminada</button>
							<div class="dropdown-menu">
								<a id="destroy" name="{{ $anime->anime }}"class="dropdown-item">quitar terminada</a>
								<a id="updatePending" name="{{ $anime->anime }}"class="dropdown-item">marcar pendiente</a>
							</div>
						</div>
				@endif

			 </div>
			@endguest
		</div>
    </div>
</div>

<div class="container mt-5">
	<h4 class="text-center">Personajes</h4>
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
	<h4 class="text-center">Series Relacionadas</h4>
</div>

@endsection
