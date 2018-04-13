<?php

namespace Trackime\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Trackime\Character;
use Trackime\Anime;
use Trackime\Date;
use Trackime\GenreAnime;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anime(Request $request)
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

		return view('animes.filter',[
				'animes'	=> $animes,
				"dates"		=> Date::orderBy('year','desc')->get(),
				"genres"	=> GenreAnime::all()->unique('genre')
			]
		);
    }

	public function character(Request $request)
	{
		$conexion = DB::table('characters')->select(['name'])->distinct();
		$loli = is_null($request->input('loli')) ? "" : "si";
		
		if(is_null($request->input('personality')) and is_null($request->input('hair')) and is_null($request->input('sex')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->get();
		else if(is_null($request->input('personality')) and is_null($request->input('hair')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('sex', $request->input('sex'))
						->get();
		else if(is_null($request->input('personality')) and is_null($request->input('sex')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('hair', $request->input('hair'))
						->get();
		else if(is_null($request->input('hair')) and is_null($request->input('sex')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('personality', $request->input('personality'))
						->get();
		else if(is_null($request->input('hair')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('personality', $request->input('personality'))
						->whereIn('sex', $request->input('sex'))
						->get();
		else if(is_null($request->input('sex')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('personality', $request->input('personality'))
						->whereIn('hair', $request->input('hair'))
						->get();
		else if(is_null($request->input('personality')))
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('sex', $request->input('sex'))
						->whereIn('hair', $request->input('hair'))
						->get();
		else
			$characters = $conexion	
						->where('loli','like', '%'.$loli.'%')
						->whereIn('personality', $request->input('personality'))
						->whereIn('sex', $request->input('sex'))
						->whereIn('hair', $request->input('hair'))
						->get();

		return view('characters.filter',[
				'characters'	=> $characters,
				'hairs'			=> Character::all()->unique('hair'),
				'personalities'	=> Character::all()->unique('personality')
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
