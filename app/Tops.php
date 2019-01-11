<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tops extends Model
{
	public function image($data)
	{
		return DB::table('animes')->where('anime', $data)->first()->web;
	}
}
