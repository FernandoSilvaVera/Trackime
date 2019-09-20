<?php

namespace Trackime\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Trackime\Character;
use Trackime\Anime;
use Trackime\Date;
use Trackime\GenreAnime;

class FilterController extends Controller
{
	const VIEW = "animes.animes";
	const FILTERS = ['genre', 'year', 'season'];
	private $bbdd = null;

	private function bbdd(){
		$this->bbdd = GenreAnime::select(['animes.anime', 'animes.web'])->distinct();
		$this->joinAnimes();
		$this->joinDates();
	}

	private function joinAnimes(){
		$this->bbdd->join('animes', 'genre_animes.anime', '=','animes.anime');
	}

	private function joinDates(){
		$this->bbdd->join('dates','dates.anime','=','animes.anime');
	}

	private function season($data){
		$this->bbdd->whereIn('dates.season', $data);
	}

	private function year($data){
		$this->bbdd->whereIn('dates.year', $data);
	}

	private function genre($data){
		$this->bbdd->whereIn('genre_animes.genre', $data);
	}

	private function add($filters, $data){
		if($filters->has($data)){
			$this->$data($filters->input($data));
		}
	}

	private function setFilters($filters){
		foreach(self::FILTERS as $data){
			if($filters->has($data)){
				$this->$data([$filters->input($data)]);
			}
		}
	}

	public function anime(Request $r)
	{
		$this->bbdd();
		$this->setFilters($r);
		return view(self::VIEW,[
				'animes'	=> $this->bbdd->paginate('1000'),
				"dates"		=> Date::orderBy('year','desc')->get(),
				"genres"	=> GenreAnime::all()->unique('genre')
		]);
	}

}
