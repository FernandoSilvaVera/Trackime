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

//VideoController
Route::get('/video/{anime}/{chapter}', 'VideoController@index');


//AnimeController
Route::get('/animes', 'AnimeController@index'); 


//CustomController
Route::get('/pendientes', 'CustomController@pendientes');
Route::get('/terminadas', 'CustomController@terminadas');


//ListController
Route::get('/animes/{animeName}', 'ListController@index');


//CharacterController
Route::get('/personajes', 'CharacterController@index');
Route::get('/personajes/{characterName}', 'CharacterController@show');


//EmissionController
Route::get('/emision', 'EmissionController@index');


//SearchController
Route::get('/busqueda', 'SearchController@index');


//FilterController
Route::get('/filtro/anime', 'FilterController@anime');
Route::get('/filtro/personaje', 'FilterController@character');


//AdminController
Route::get('/administrar', 'AdminController@index');
Route::post('saveAnime', 'AdminController@storeAnime');


//CustomController
Route::post('/agregarSerie', 'CustomController@store'); 
Route::post('/destroyAnime', 'CustomController@destroy'); 
Route::post('/updateAnime', 'CustomController@update'); 


//UserController
Route::post('/updateImage', 'UserController@update'); 
Route::get('/usuario/{user}', 'UserController@index'); 

Route::get('/agregarSerie', function(){
	abort(404);
});

Route::get('/', 'HomeController@index'); 

Route::get('/aleatorio', function(){
	return view('random');
});
/*
Route::get('/user/{userName}',function($userName){
	return view("user.user",['userName' => $userName]);
})->where('userName', '[A-Za-z]+');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
