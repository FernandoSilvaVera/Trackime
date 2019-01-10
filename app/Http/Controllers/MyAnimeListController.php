<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;

class MyAnimeListController extends Controller
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
    public function information($id)
    {
		$uri = "https://myanimelist.net/anime/$id";

		$codeHTML = null;
		foreach(file($uri) as $line)
			$codeHTML .= htmlspecialchars($line);

		$arrayUtil = explode ('Episodes:', $codeHTML);
		$information = explode ('&lt;/span&gt;', explode ('Duration', $arrayUtil[1])[0]);

		$genres = array();
		foreach(explode ('&lt;a href=&quot;/anime/genre/', $information[10]) as $genre){
			foreach(explode('&gt;', explode('&lt;/', $genre)[0]) as $a);
				array_push($genres, $a);
		}

		$this->i18n($genres);

		return [
			"chapters"	=> explode ('&', $information[1])[0],
			"state" 	=> explode (' ', explode ('&', $information[2])[0])[2],
		    "date"		=> explode ('&', $information[3])[0],
		    "season"    => explode (' ', explode ('&', explode ('&gt;', $information[4])[1])[0])[0],
		    "year"	    => explode (' ', explode ('&', explode ('&gt;', $information[4])[1])[0])[1],
			"genres"	=> $genres
		];
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

	private function i18n(&$genres){
		unset ($genres[0]);
		foreach($genres as &$genre)
			switch( strtoupper($genre) ){
				case "ACTION":
					$genre = "Acción";
					break;
				case "ADVENTURE":
					$genre = "Aventura";
					break;
				case "COMEDY":
					$genre = "Comedia";
					break;
				case "DRAMA":
					$genre = "Drama";
					break;
				case "FANTASY":
					$genre = "Fantasía";
					break;
				case "ROMANCE":
					$genre = "Romance";
					break;
				case "SEINEN":
					$genre = "Seinen";
					break;
			}
	}

}
