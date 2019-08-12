<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenreAnime extends Model
{
	public $timestamps		= false;
	public $incrementing	= false;

	public function genre()
	{
		return $this->belongsToMany('Trackime\GenreAnime','animes','anime','anime','anime','anime');
	}

	public function image()
	{
		return DB::table('animes')->where('anime', $this->anime)->first()->web;
	}

}
