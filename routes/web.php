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

Route::get('/animes', 'AnimeController@index'); 
Route::get('/pendientes', 'CustomController@pendientes');
Route::get('/terminadas', 'CustomController@terminadas');
Route::get('/animes/{animeName}', 'ListController@index');
Route::get('/personajes', 'CharacterController@index');
Route::get('/personajes/{characterName}', 'CharacterController@character');
Route::get('/emision', 'EmissionController@index');
Route::get('/busqueda', 'SearchController@index');
Route::get('/filtro', 'FilterController@index');

Route::get('/', function(){
	return view("home");
});

Route::get('/aleatorio', function(){
	return view('animes.random');
});

Route::post('/agregarSerie', 'CustomController@store'); 

Route::get('/user/{userName}',function($userName){
	return view("user.user",['userName' => $userName]);
})->where('userName', '[A-Za-z]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
