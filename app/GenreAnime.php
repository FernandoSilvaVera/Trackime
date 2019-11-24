<?php

namespace Trackime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GenreAnime extends Anime
{
	public $timestamps		= false;
	public $incrementing	= false;
}
