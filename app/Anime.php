<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Anime extends Model
{
	public $timestamps		= false;
	public $incrementing	= false;

	protected $primaryKey	= "anime";
	protected $keyType		= "string";

	public function genre()
	{
		return $this->belongsToMany('Trackime\GenreAnime','animes','anime','anime','anime','anime');
	}

	public function image($data)
	{
		return DB::table('animes')->where('anime', $data)->first()->web;
	}

	public static function pending($anime)
	{
		return DB::table('dates')->where('anime', $anime)->where('state', 'pending')->first();
	}

	public function character()
	{
		return $this->belongsToMany('Trackime\Character','animes','anime','anime','anime','anime');
	}
}
