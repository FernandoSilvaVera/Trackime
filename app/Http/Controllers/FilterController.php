<?php

namespace Trackime\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Trackime\Anime;
use Trackime\Date;
use Trackime\Genre;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$conexion = DB::table('genre_animes')
				->select(['animes.anime','animes.web'])->distinct()
				->join('animes','genre_animes.anime','=','animes.anime')
				->join('dates','dates.anime','=','animes.anime');
	
		if(is_null($request->input('genre')) and is_null($request->input('year')) and is_null($request->input('season')))
			$animes = $conexion->get();
		else if(is_null($request->input('genre')) and is_null($request->input('year')))
			$animes = $conexion
					->whereIn('dates.season', $request->input('season'))
					->get();
		else if(is_null($request->input('genre')) and is_null($request->input('season')))
			$animes = $conexion
					->whereIn('dates.year', $request->input('year'))
					->get();
		else if(is_null($request->input('year')) and is_null($request->input('season')))
			$animes = $conexion
					->whereIn('genre_animes.genre', $request->input('genre'))
					->get();
		else if(is_null($request->input('year')))
			$animes = $conexion
					->whereIn('genre_animes.genre', $request->input('genre'))
					->whereIn('dates.season', $request->input('season'))
					->get();
		else if(is_null($request->input('season')))
			$animes = $conexion
					->whereIn('genre_animes.genre', $request->input('genre'))
					->whereIn('dates.year', $request->input('year'))
					->get();
		else if(is_null($request->input('genre')))
			$animes = $conexion
					->whereIn('dates.season', $request->input('season'))
					->whereIn('dates.year', $request->input('year'))
					->get();
		else
			$animes = $conexion
					->whereIn('genre_animes.genre', $request->input('genre'))
					->whereIn('dates.year', $request->input('year'))
					->whereIn('dates.season', $request->input('season'))
					->get();

		return view('animes.filter',['animes' => $animes]);
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
    public function store(Request $request)
    {
        //
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
