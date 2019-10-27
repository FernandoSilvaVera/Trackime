<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;
use Trackime\Genre;
use Trackime\Anime;
use Trackime\Video;

class AdminController extends Controller
{

	protected $primaryKey = ['anime','chapter'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function index()
	{
		return view('user.admin',[
				"animes" => Anime::all()
			]
		);
	}

	public function bbdd(){

		return view('user.admin.bbdd' ,[
				"animes" => Video::all()
			]
		);

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

	private function cleanRequest(Request $request){
		$anime = explode("/", $request->animeFLV);
		$request->code = $anime[4];
		$request->anime = str_replace("-", " ", $anime[5]);
		$request->animeFLV = $anime[5];
		$request->season = 1;
		$request->chapters = 1;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAnime(Request $request)
    {
		$this->cleanRequest($request);
		try{
			$saved = AnimeController::store($request);
			GenreAnimeController::store($request->myAnimeList, $request->anime);
			VideoController::store($request);
			DateController::store($request);
			file_put_contents('images/'.$request->animeFLV.'.jpg', $file = file_get_contents($request->image));
		}catch(\Exception $e){
			if(isset($saved)){
				(new AnimeController)->destroy($request->anime, false);
			}
		}

		return redirect('/administrar');
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
