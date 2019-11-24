<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class date extends Anime
{
    public $timestamps = false;

	public function animes()
	{
		return $this->belongsToMany('Trackime\Anime','custom','anime','anime','anime','anime');
	}

	public function chapter()
	{
		return count(DB::table('videos')->where('anime', $this->anime)->get());	
	}

	public function animeFLV()
	{
		return DB::table('animes')->where('anime', $this->anime)->first()->animeFLV;
	}

}
