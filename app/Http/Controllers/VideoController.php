<?php

namespace Trackime\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Trackime\Utils\MyAnimeList;
use Illuminate\Http\Request;
use Trackime\Utils\AnimeID;
use Trackime\Utils\AnimeFLV;
use Trackime\Video;
use Trackime\Date;
use Trackime\Anime;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function watch(Request $request){
		$chapter = $request->input('capitulo');
		$anime = $request->input('anime');

		$video = Video::where('anime', $anime)->where('chapter', $chapter)->first();

		return view('animes.video',[
			"chapter" => $video->chapter
			, "anime" => $video->anime
			, "video" => $video->video
			, "siguiente" => Video::where('anime', $anime)->where('chapter', $chapter+1)->first()
			, "anterior" =>  Video::where('anime', $anime)->where('chapter', $chapter-1)->first()
			]
		);  
	}

    public function index($anime, $chapter)
    {
   		return Redirect::to(Video::where('anime', $anime)->where('chapter', $chapter)->first()->video);
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
    public static function store(Request $request)
    {
		$videos = new Video;
		$chapter = '4';
		$animeFLV = new AnimeFLV($request->code, $request->animeFLV);
		$resp = $animeFLV->streamiumFullChapter();

		foreach($resp as $chapter => $hash){
			if(isset($hash['hash'])){
				$video = new Video;
				$video->anime	= $request->anime;
				$video->chapter = $chapter;
				$video->video	= $hash["hash"];
				$video->download = null;
				$video->date = date("Y/m/d h:i:s");
				$video->admin = Auth::user()->name;
				$video->save();
			}
		}
    }

    public function downloadChapter(Request $request)
    {

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
    public function update()
    {
		$emission = Date::where('state', 'currently')->get();
		foreach($emission as $anime){
			if(AnimeID::videoRapiVideo($anime->animeFLV(), $anime->chapter()+1)){
				$video = new Video;
					$video->anime	= $anime->anime;
					$video->chapter = $anime->chapter()+1; 
					$video->video	= null;
					$video->date	= date("Y/m/d h:i:s");
					$video->admin	= Auth::user()->name;
				$video->save();
			}
		}
		return redirect('/administrar');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($anime, $chapter)
    {
		if(!Auth::user()->admin)
			return back();
		Video::where('anime', $anime)->where('chapter', $chapter)->delete();      
		return Redirect('/');
    }
}
