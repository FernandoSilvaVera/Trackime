<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\QueryException;
use Trackime\Utils\AnimeYT;
use Trackime\Utils\AnimeFLV;
use Trackime\Genre;
use Trackime\Anime;
use Trackime\Video;
use Trackime\Date;
use Trackime\GenreAnime;

class AdminController extends Controller
{

	protected $primaryKey = ['anime','chapter'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		return view('user.admin',[
				"genres" => Genre::all(),
				"animes" => Anime::all()
			]
		);
	}

	public function updateEmission()
	{
	
	}

    public function updateChapters()
    {
		$animeYT = new AnimeYT;
		$animes = Anime::all();
		foreach($animes as $anime)
			if($anime->animeYT !== null){
				$update = Anime::where('animeYT', $anime->animeYT)->first();
				$update->chapters = $animeYT->chapter($anime->animeYT);
				try{
					$update->save();
				}catch(QueryException $e){
					$update->chapters = 1;
					$update->save();
				}
			}

		return view('user.admin',[
				"genres" => Genre::all(),
				"animes" => Anime::all()
			]
		);
    }
	
	public function updateVideoAmazon()
	{
		$animes = Video::all();
		foreach($animes as $anime){
			if($anime->video === 'pending'){
				$video = new Video;
				$video->anime	= $anime->anime;
				$video->chapter = $anime->chapter;
				$video->video	= AnimeFLV::videoRapiVideo($anime->web(), $anime->chapter);
				try{
					$video->save();
				}catch(QueryException $e){
					Video::where('chapter', $anime->chapter)
						->where('anime', $anime->anime)
						->update(['video' => AnimeFLV::videoRapiVideo($anime->web(), $anime->chapter)]);
				}
			}
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAnime(Request $request)
    {
		$anime = new Anime;
			$anime->anime		= $request->input('anime');
			$anime->season		= $request->input('season');
			$anime->tag			= $request->input('tag');
			$anime->web			= $request->input('web');
			$anime->note		= $request->input('note');
			$anime->chapters	= $request->input('chapters');
			$anime->animeYT		= $request->input('animeYT');
		$anime->save();

		foreach($request->input('genre') as $gen){
			$genre = new GenreAnime;
			$genre->anime = $request->input('anime');
			$genre->genre = $gen;
			$genre->save();
		}

		return view('user.admin',[
				"genres" => Genre::all(),
				"animes" => Anime::all()
			]
		);
    }

	public function setPendingVideo(Request $request)
	{
		$animes = Anime::all();
		foreach($animes as $anime)
			for($i=$anime->chapters; $i>0; $i--){
				$video = new Video;
				$video->anime = $anime->anime;
				$video->chapter = $i;
				$video->video = 'pending';
				$video->save();
			}
			
		return view('user.admin',[
				"genres" => Genre::all(),
				"animes" => Anime::all()
			]
		);
	}

	public function storeVideo(Request $request)
	{
		$video = new Video;
			$video->anime	= $request->input('anime');
			$video->chapter = $request->input('chapter');
			$video->video	= $request->input('video');
		try{
			$video->save();
		}catch(QueryException $e){
			Video::
						where('chapter', $request->input('chapter'))
						->where('anime', $request->input('anime'))
						->update(['video' => $request->input('video')]);
		}


		return view('user.admin',[
				"genres" => Genre::all(),
				"animes" => Anime::all()
			]
		);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
