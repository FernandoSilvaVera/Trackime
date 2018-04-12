<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;
use Trackime\Date;
use Trackime\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$animes = [];
		foreach(Date::where('state', 'currently')->get() as $currently)
			array_push($animes ,$currently->anime);

        return view('home',[
				'animes' => Video::whereIn('anime', $animes)->orderBy('date', 'desc')->take(12)->get()
			]
		);
    }
}
