<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;

class custom extends Model
{
    public $timestamps = false;
	protected $table = "custom";

	public function genre()
	{
		return $this->belongsToMany('Trackime\GenreAnime','animes','anime','anime','anime','anime');
	}

}
