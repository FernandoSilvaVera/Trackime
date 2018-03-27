@extends('layouts.skel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
			<h3 class="text-center">Listado de capitulos</h3>
			<div class="col-12" style="overflow:auto;height:300px">
				<table class="table table-hover" >
					<tbody>
						@for($chapter=$anime->chapters; $chapter>0; $chapter--)
						<tr>
							<td>{{ $anime->anime }}</td>
							<td>{{ $chapter }}</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
		</div>

		<!-- Parte derecha de la pagina-->

        <div class="col-6 text-center">
			<img class="card-img-top col-md-8 mb-1" src="{{ asset('images/' . $anime['web']) }}.jpg">
			<h3 id="name_anime">{{ $anime->anime }}</h3>
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
</div>

<div class="container mt-5">
	<h3 class="text-center">Series Relacionadas</h3>
</div>

@endsection
