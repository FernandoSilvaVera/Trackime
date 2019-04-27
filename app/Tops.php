<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Trackime\Anime;

class Tops extends Model
{
	public $timestamps		= false;
	public $incrementing	= false;

	protected $primaryKey	= ["user", "genre", "anime"];

	public function image($anime)
	{
		return Anime::image($anime);
	}
}
