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
								<td><a href="{{ url('/ver' . '?anime=' . $anime->anime . '&capitulo=' . $chapter) }}" style="color:black;">{{ $anime->anime }}</a></td>
								<td><a href="{{ url('/ver' . '?anime=' . $anime->anime . '&capitulo=' . $chapter) }}" style="color:black;">{{ $chapter }}</a></td>
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

@endsection
