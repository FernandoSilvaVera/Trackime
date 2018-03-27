<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;

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

	public function character()
	{
		return $this->belongsToMany('Trackime\Character','animes','anime','anime','anime','anime');
	}
}
