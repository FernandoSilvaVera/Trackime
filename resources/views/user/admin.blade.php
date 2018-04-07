@extends('layouts.skel')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-6 text-center">
				<form action="{{ url(('updateAnimeFLV')) }}" method="post">
					@csrf <button type="submit" class="btn btn-success">Update Video AnimeFLV</button>
				</form>
			</div>
			<div class="col-6 text-center">
				<form action="{{ url(('updateEmission')) }}" method="post">
					@csrf <button type="submit" class="btn btn-danger">Update table dates MyAnimeList</button>
				</form>
			</div>
		</div>
	</div>

	<div class="container mt-5 text-center">
		<h3 class="mb-4">Add Anime</h3>
			<form class='form-group row text-center' action="{{ url(('saveAnime')) }}" method="post">
				@csrf
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Anime" 	name="anime"></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Season" 	name='season' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Tag" 		name='tag' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Note" 		name='note' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Chapters" 	name='chapters' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Web" 		name='web' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="AnimeYT"	name='animeYT' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="AnimeFLV" 	name='animeFLV' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="AnimeList" name='myAnimeList' ></div>
				<div class="col-md-12 col-6 mb-4">
					<select multiple class="form-control" id="exampleFormControlSelect2" name="genre[]">
						@foreach($genres as $genre)
							<option>{{ $genre->genre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-12 mb-4"> <button type="submit" class="btn btn-success">Save</button> </div>
			</form>
	</div>

@endsection
