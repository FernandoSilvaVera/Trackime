<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Trackime\Anime;

class Tops extends Anime
{
	public $timestamps		= false;
	public $incrementing	= false;

	protected $primaryKey	= ["user", "genre", "anime"];
}
