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
        <div class="col-md-5">
			<h3 class="text-center">{{ $anime['anime'] }}</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		</div>
    </div>
</div>
@endsection
