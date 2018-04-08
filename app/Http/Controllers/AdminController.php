<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\QueryException;
use Trackime\Utils\AnimeYT;
use Trackime\Utils\AnimeFLV;
use Trackime\Utils\MyAnimeList;
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

    public function saveImage($url , $name)
	{

		$save = file_put_contents('images/'.$name.'.jpg', $file = file_get_contents($url));
		return view('user.admin',[
				"genres" => Genre::all(),
				"animes" => Anime::all()
			]
		);
		
	}

	public function updateEmission()
	{
		$animes = Anime::all();
		foreach($animes as $anime)
			if(!is_null($anime->pending($anime->anime))){
				$info = MyAnimeList::information($anime->myAnimeList);
				Date::where('anime', $anime->anime)
					->update([
						'season' => $info['season'],
						'state'	 => $info['state'],
						'year'	 => $info['year']
						]
					);
			}
	}

	public function updateVideoAnimeFLV()
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
		//Anime
		$anime = new Anime;
			$anime->anime		= $request->input('anime');
			$anime->season		= $request->input('season');
			$anime->tag			= $request->input('tag');
			$anime->web			= $request->input('web');
			$anime->note		= $request->input('note');
			$anime->chapters	= $request->input('chapters');
			$anime->animeYT		= $request->input('animeYT');
			$anime->animeFLV	= $request->input('animeFLV');
			$anime->myAnimeList	= $request->input('myAnimeList');
		$anime->save();

		//Image
		$this->saveImage($request->input('image'), $request->input('web'));

		//Genre
		foreach($request->input('genre') as $gen){
			$genre = new GenreAnime;
			$genre->anime = $request->input('anime');
			$genre->genre = $gen;
			$genre->save();
		}
	
		//Video
		for($i=$request->chapters; $i>0; $i--){
			$video = new Video;
			$video->anime	= $request->input('anime');
			$video->chapter = $request->input('chapters'); 
			$video->video	= AnimeFLV::videoRapiVideo($request->input('animeFLV'), $i);
			$video->save();
		}
	
		//Dates
		$info = MyAnimeList::information($request->input('myAnimeList'));
		$date = new Date;
			$date->anime = $request->input('anime');
			$date->day_new_chapter = 'pending';
			$date->start = 'pending';
			$date->end	 = 'pending';
			$date->season	= $info['season'];
			$date->year		= $info['year'];
			$date->state	= $info['state'];
		$date->save();

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
