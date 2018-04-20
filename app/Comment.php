<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class comment extends Model
{
    public $timestamps = false;

	public function image()
	{
		return DB::table('users')->where('name', $this->user)->first()->image;
	}

}
