<?php

namespace Trackime\Http\Controllers;

use Trackime\Custom;
use Trackime\Date;
use Trackime\GenreAnime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{

    public function store(Request $request)
    {
		$custom = new Custom;
		$custom->user	= Auth::user()->name;
		$custom->anime 	= $request->anime;
		$custom->state 	= $request->state;
		return [
			  "status" => $custom->save()
			, "data" => $custom
		];
	}

	public function addStatus(Request $r){
		if(Custom::where('user', Auth::user()->name)->where('anime', $r->anime)->first()){
			return $this->update($r);
		}
		return $this->store($r);
	}

	public function newStatus(Request $r){
		switch($r->state){
			case Custom::ADD_PENDING:
			case Custom::ADD_FINISHED:
				$this->addStatus($r);
			break;
			case Custom::DELETE_ANIME:
				$this->destroy($r);
			break;
		}
		return $this->create($r->anime, Auth::user());
	}

	public function create($anime, $loged){
		if(!$loged || !$custom = Custom::where('user', Auth::user()->name)->where('anime', $anime)->first()){
			return $this->default();
		}
		switch($custom->state){
			case Custom::ADD_PENDING;
				$ret = $this->pending();
			break;
			case Custom::ADD_FINISHED;
				$ret = $this->finished();
			break;
		}
		return $ret;
	}

	private function addPending(){
		return [
			"trad" => "Pendiente",
			"status" => CUSTOM::ADD_PENDING
		];
	}

	private function addFinished(){
		return [
			"trad" => "Terminada",
			"status" => CUSTOM::ADD_FINISHED
		];
	}

	private function removeFinished(){
		return [
			"trad" => "Quitar terminada",
			"status" => null
		];
	}

	private function removePending(){
		return [
			"trad" => "Quitar pendiente",
			"status" => null
		];
	}

	private function finished(){
		return [
			$this->addPending(),
			$this->removeFinished(),
			"status" => CUSTOM::FINISHED
		];
	}

	private function pending(){
		return [
			$this->removePending(),
			$this->addFinished(),
			"status" => CUSTOM::PENDING
		];
	}

	private function default(){
		return [
			$this->addPending(),
			$this->addFinished(),
			"status" => CUSTOM::DEFAULT
		];
	}

    public function update(Request $request)
    {
		return Custom::where('user', Auth::user()->name)->where('anime', $request->anime)->update(['state' => $request->state]);
    }

    public function destroy(Request $request)
    {
		Custom::where('user', Auth::user()->name)->where('anime', $request->anime)->delete();
    }
}
