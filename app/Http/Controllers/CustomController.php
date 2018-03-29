<?php

namespace Trackime\Http\Controllers;

use Trackime\Custom;
use Trackime\Date;
use Trackime\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

	public function pendientes()
	{
		return $this->show("pendientes");
	}

	public function terminadas()
	{
		return $this->show("terminadas");
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$custom = new Custom;
		$custom->user	= Auth::user()->name;
		$custom->anime 	= $request->anime;
		$custom->state 	= $request->state;
		$custom->save();
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id === "pendientes")
			return view('animes.animes',[
					"animes"	=> Custom::where('state', 'pendiente')->where('user', Auth::user()->name)->paginate(12),
					"dates"		=> Date::all(),
					"genres"	=> Genre::all()
				]
			);
		else if($id === "terminadas")	
			return view('animes.animes',[
					"animes"	=> Custom::where('state', 'terminada')->where('user', Auth::user()->name)->paginate(12),
					"dates"		=> Date::all(),
					"genres"	=> Genre::all()
				]
			);
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
