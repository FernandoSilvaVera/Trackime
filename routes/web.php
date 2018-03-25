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

Route::get('/', function(){
	return view("home");
});

Route::get('/animes', 'AnimeController@index'); 
Route::get('/pendientes', 'CustomController@pendientes');
Route::get('/terminadas', 'CustomController@terminadas');

Route::get('/personaje', function(){
	return view('animes.character');
});
Route::get('/aleatorio', function(){
	return view('animes.random');
});

Route::get('/emision', function(){
	return view('animes.emission');
});

Route::get('/busqueda', function(){
	return view('search');
});


Route::post('/agregarSerie', 'CustomController@store'); 


Route::get('/animes/{animeName}', 'ListController@index');


Route::get('/user/{userName}',function($userName){
	return view("user.user",['userName' => $userName]);
})->where('userName', '[A-Za-z]+');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
