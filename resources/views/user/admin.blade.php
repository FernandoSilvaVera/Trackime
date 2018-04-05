@extends('layouts.skel')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-4 text-center">
				<form action="{{ url(('updateChapters')) }}" method="post">
					@csrf <button type="submit" class="btn btn-success">Update Chapters AnimeYT</button>
				</form>
			</div>
			<div class="col-4 text-center">
				<form action="{{ url(('setPendingVideo')) }}" method="post">
					@csrf <button type="submit" class="btn btn-danger">Set pending all videos</button>
				</form>
			</div>
			<div class="col-4 text-center">
				<form action="{{ url(('updateEmission')) }}" method="post">
					@csrf <button type="submit" class="btn btn-danger">Update Emission</button>
				</form>
			</div>
		</div>
	</div>

	<div class="container mt-5 text-center">
		<h3 class="mb-4">Add Anime</h3>
			<form class='form-group row text-center' action="{{ url(('saveAnime')) }}" method="post">
				@csrf
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Anime" name="anime"></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Season" name='season' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Tag" name='tag' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Note" name='note' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Chapters" name='chapters' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Web" name='web' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="AnimeYT" name='animeYT' ></div>
				<div class="col-6">
					<select multiple class="form-control" id="exampleFormControlSelect2" name="genre[]">
						@foreach($genres as $genre)
							<option>{{ $genre->genre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-12 mb-4"> <button type="submit" class="btn btn-success">Save</button> </div>
			</form>
	</div>

	<div class="container mt-5 text-center">
		<h3 class="mb-4">Add Video</h3>
			<form class='form-group row text-center' action="{{ url(('saveVideo')) }}" method="post">
				@csrf
				<div class="col-4">
					<select class="form-control" name="anime">
						@foreach($animes as $anime)
							<option>{{ $anime->anime }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-4"><input class="form-control" type="text" placeholder="chapter" name='chapter' ></div>
				<div class="col-4"><input class="form-control" type="text" placeholder="video" name='video' ></div>
				<div class="col-12 mt-4"> <button type="submit" class="btn btn-success">Save</button> </div>
			</form>
	</div>

@endsection
