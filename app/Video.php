<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
	public $timestamps		= false;
	protected $primaryKey	= ["anime", "chapter"];
	public $incrementing	= false;

	public function web()
	{
		return DB::table('animes')->where('anime', $this->anime)->first()->animeFLV;
	}

	public function image()
	{
		return DB::table('animes')->where('anime', $this->anime)->first()->web;
	}

	public function genre()
	{
		return $this->hasMany('Trackime\GenreAnime','anime','anime','anime','anime','anime');
	}
}
