@extends('layouts.skel')

@section('content')

	<div class="container text-center">
		<h3 class="mb-4">Add Anime</h3>
			<form class='form-group row text-center' action="{{ url(('saveAnime')) }}" method="post">
				@csrf
				<div class="col-6 mb-4"><input required="required" class="form-control" type="text" placeholder="Anime" name="anime"></div>
				<div class="col-6 mb-4">
					<select class="form-control" name="season" required>
						<option disabled selected>Season</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
				<div class="col-6 mb-4"><input required="required" class="form-control" type="text" placeholder="960/540 <==> 480/270" name='image' ></div>
				<div class="col-6 mb-4"><input required="required" class="form-control" type="number" min="1" placeholder="Chapters" name='chapters' ></div>
				<div class="col-6 mb-4"><input required="required" class="form-control" type="text" placeholder="animeFLV" name='animeFLV' >
					https://animeflv.net/anime/2479/ange-vierge <br> Nos quedamos con la parte final <br> ange-vierge
				</div>
				<div class="col-6 mb-4"><input required="required" class="form-control" type="number" min="1" placeholder="myanimelist id" name='myAnimeList'>
					https://myanimelist.net/anime/32171/Ange_Vierge <br> Nos quedamos con los números <br> 32171
				</div>
				<div class="col-12 mb-4"> <button type="submit" class="btn btn-success">Save</button> </div>
			</form>
	</div>

	<div class="container">
		<h4><a style="color:black" href="https://www.google.es/search?q=anime&hl=en&biw=1920&bih=927&tbs=isz:ex,iszw:960,iszh:540&tbm=isch&source=lnt" target="_blank">Imagenes 960/540</a></h4>
		<h4><a style="color:black" href="https://www.google.es/search?q=anime&hl=en&biw=1920&bih=927&tbs=isz:ex,iszw:480,iszh:270&tbm=isch&source=lnt" target="_blank">Imagenes 480/270</a></h4>
		<h4><a style="color:black" href="https://www.google.es/search?q=anime&hl=en&biw=1920&bih=927&tbs=isz:ex,iszw:480,iszh:270&tbm=isch&source=lnt" target="_blank">AnimeFLV</a></h4>
		<h4><a style="color:black" href="https://www.google.es/search?q=anime&hl=en&biw=1920&bih=927&tbs=isz:ex,iszw:480,iszh:270&tbm=isch&source=lnt" target="_blank">MyAnimeList</a></h4>
	</div>

@endsection
