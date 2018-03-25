@extends('layouts.skel')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
			<h3 class="text-center">Listado de capitulos</h3>
			<table class="table table-hover">
				<tbody>
					@for($chapter=$anime['chapters']; $chapter>0; $chapter--)
					<tr>
						<td>{{ $anime['anime'] }}</td>
						<td>{{ $chapter }}</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
        <div class="col-md-5 text-center">
			<h3 id="name_anime">{{ $anime['anime'] }}</h3>
			<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
@endsection
