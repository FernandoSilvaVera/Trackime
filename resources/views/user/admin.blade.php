@extends('layouts.skel')

@section('content')

	<div class="container text-center">
		<h3 class="mb-4">Add Anime</h3>
			<form class='form-group row text-center' action="{{ url(('saveAnime')) }}" method="post">
				@csrf
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Anime" name="anime"></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Season" name='season' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Tag" name='tag' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Note" name='note' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="URL image 1920/1080 <==>  960/540 <==> 480/270" name='image' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Web" name='web' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="Chapters" name='chapters' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="AnimeFLV" name='animeFLV' ></div>
				<div class="col-6 mb-4"><input class="form-control" type="text" placeholder="AnimeList ID" name='myAnimeList' ></div>
				<div class="col-12 mb-4"> <button type="submit" class="btn btn-success">Save</button> </div>
			</form>
	</div>

@endsection
