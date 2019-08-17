<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class custom extends Model
{
    public $timestamps = false;
	protected $table = "custom";

	const PENDING = "Pendiente";
	const FINISHED = "Terminada";
	const DEFAULT = "Agregar";

	const ADD_PENDING = 1;
	const ADD_FINISHED = 2;
	const DELETE_ANIME = null;

	public function genre()
	{
		return $this->belongsToMany('Trackime\GenreAnime','animes','anime','anime','anime','anime');
	}

	public function image($data)
	{
		return DB::table('animes')->where('anime', $data)->first()->web;
	}

	public function web()
	{
		return DB::table('animes')->where('anime', $this->anime)->first()->web;
	}
	
	public function genres()
	{
		return DB::table('genre_animes')->where('anime', $this->anime)->get();
	}

	public function animes()
	{
		return $this->belongsToMany('Trackime\Anime','custom','anime','anime','anime','anime');
	}

}
