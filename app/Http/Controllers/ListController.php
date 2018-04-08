<?php

namespace Trackime\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Trackime\Anime;
use Trackime\Video;
use Trackime\Custom;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($anime)
    {
		if(is_null(Anime::where('anime', $anime)->first()))
			abort(404);
		else
			if(Auth::user())
				return view('animes.list', [
						'anime'	  => Anime::where('anime', $anime)->first(),
						'video'	  => Video::where('anime', $anime)->get(),
						'custom'  => Custom::where('user', Auth::user()->name)->where('anime', $anime)->first()
					]
				);
			else
				return view('animes.list', [
						'anime'	  => Anime::where('anime', $anime)->first(),
						'video'	  => Video::where('anime', $anime)->get(),
						'custom'  => null
					]
				);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
