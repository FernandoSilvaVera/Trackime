<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//return Redirect::to('https://download2194.mediafire.com/9n6njvj571cg/o4jysxti2f2f7mi/2890_12.mp4');
Route::get('/video/{anime}/{chapter}', 'VideoController@index');
Route::get('/animes', 'AnimeController@index'); 
Route::get('/pendientes', 'CustomController@pendientes');
Route::get('/terminadas', 'CustomController@terminadas');
Route::get('/animes/{animeName}', 'ListController@index');
Route::get('/personajes', 'CharacterController@index');
Route::get('/personajes/{characterName}', 'CharacterController@character');
Route::get('/emision', 'EmissionController@index');
Route::get('/busqueda', 'SearchController@index');
Route::get('/filtro/anime', 'FilterController@anime');
Route::get('/filtro/personaje', 'FilterController@character');
Route::get('/administrar', 'AdminController@index');
Route::get('/test', 'AdminController@updateVideoAmazon');

Route::post('updateChapters', 'AdminController@updateChapters');
Route::post('saveAnime', 'AdminController@storeAnime');
Route::post('saveVideo', 'AdminController@storeVideo');
Route::post('setPendingVideo', 'AdminController@setPendingVideo');

Route::get('/', function(){
	return view("home");
});

Route::get('/aleatorio', function(){
	return view('random');
});

Route::post('/agregarSerie', 'CustomController@store'); 

Route::get('/user/{userName}',function($userName){
	return view("user.user",['userName' => $userName]);
})->where('userName', '[A-Za-z]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
