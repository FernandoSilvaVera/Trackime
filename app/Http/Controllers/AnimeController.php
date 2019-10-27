<?php

namespace Trackime\Http\Controllers;

use Trackime\Anime;
use Trackime\Date;
use Trackime\GenreAnime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('animes.animes',[
				"animes"	=> Anime::paginate(12),
				"dates"		=> Date::orderBy('year','desc')->get(),
				"genres"	=> GenreAnime::all()->unique('genre')
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
		$anime = new Anime;
		$anime->anime		= $request->anime;
		$anime->season		= $request->season;
		$anime->web			= $request->animeFLV;
		$anime->chapters	= $request->chapters;
		$anime->animeFLV	= $request->animeFLV;
		$anime->myAnimeList	= $request->myAnimeList;
		return $anime->save();
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($anime, $redirect=true)
    {
		if(!Auth::user()->admin)
			return back();
		Anime::where('anime', $anime)->delete();      
		return $this->redirect($redirect);
    }

	protected function redirect($need){
		return $need ? Redirect('/') : null;
	}

}
