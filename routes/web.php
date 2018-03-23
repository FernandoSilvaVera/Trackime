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

Route::get('/animes', function(){
	return view("animes.animes");
});

Route::get('/animes/{animeName}', function($animeName){
	return view("animes.list",['animeName' => $animeName]);
})->where('animeName','[A-Za-z]+');

Route::get('/user/{userName}',function($userName){
	return view("user.user",['userName' => $userName]);
})->where('userName', '[A-Za-z]+');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
