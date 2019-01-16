<?php

Route::get('posts', 'PostController@show')->name('show');

Route::get('/', function () {
	return 'home, ruta inicio en routes/web';
    //return view('welcome');
});
Route::get('admin', function(){
	return view('admin.dashboard');
});