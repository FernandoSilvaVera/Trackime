<?php

namespace Trackime\Http\Controllers;

use Trackime\Anime;
use Trackime\Date;
use Trackime\Genre;
use Illuminate\Http\Request;

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
				"genres"	=> Genre::all()
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
