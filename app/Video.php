<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Anime
{
	public $timestamps		= false;
	protected $primaryKey	= ["anime", "chapter"];
	public $incrementing	= false;

	public function image()
	{
		return DB::table('animes')->where('anime', $this->anime)->first()->web;
	}

}
