<?php

namespace Trackime\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Trackime\User;
use Trackime\Custom;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
		$infoUser = User::where('name', $user)->first();

		if(is_null($infoUser))	
			echo "pendiente crear vista no existe el usuario";
		else if(is_null(Auth::user()))
			return $this->pending($user);
		else
			return $this->pending($user);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pending($user)
    {
		return view ('user.pending',[
					'animes'	=> Custom::where('user', $user)->where('state', 'pendiente')->paginate(12),
					'userName'	=> User::where('name', $user)->first()
			]
		);
    }

    public function finished($user)
    {
		return view ('user.finished',[
					'animes'	=> Custom::where('user', $user)->where('state', 'terminada')->paginate(12),
					'userName'	=> User::where('name', $user)->first()
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
    public function update(Request $request)
    {
		User::where('name', Auth::user()->name)->update(['image' => $request->image]);
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
