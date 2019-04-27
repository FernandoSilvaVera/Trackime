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

	public static function image($anime)
	{
		return DB::table('animes')->where('anime', $anime)->first()->web;
	}

	public function character()
	{
		return $this->belongsToMany('Trackime\Character','animes','anime','anime','anime','anime');
	}

	public function chapter()
	{
		return count(DB::table('videos')->where('anime', $this->anime)->get());
	}

}
