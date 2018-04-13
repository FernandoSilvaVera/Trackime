<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;
use Trackime\GenreAnime;
use Trackime\Utils\MyAnimeList;

class GenreAnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public static function store($id, $anime)
	{
		foreach(MyAnimeList::information($id)['genres'] as $gen){
			$genre = new GenreAnime;
				$genre->anime = $anime;
				$genre->genre = $gen;
			$genre->save();
		}

/*
		foreach($request->input('genre') as $gen){
			$genre = new GenreAnime;
				$genre->anime = $request->input('anime');
				$genre->genre = $gen;
			$genre->save();
		}*/
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
