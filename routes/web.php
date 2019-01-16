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
Route::get('posts', 'PostController@show')->name('show');

Route::get('/', function () {
	return 'home, ruta inicio en routes/web';
    //return view('welcome');
});
