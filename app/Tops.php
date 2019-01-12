<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tops extends Model
{
	public $timestamps		= false;
	protected $primaryKey	= ["user", "genre", "anime"];
	public $incrementing	= false;

	public function image($data)
	{
		return DB::table('animes')->where('anime', $data)->first()->web;
	}
}
