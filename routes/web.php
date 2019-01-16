<?php

//Route::get('posts', 'PostController@show')->name('show');

Route::get('/', 'PagesController@home');
Route::get('home', 'HomeController@index')->name('admin');

Route::group([
		'prefix' => 'admin',
		'namespace' => 'Admin', 
		'middleware' => 'auth'], 
	function (){
		Route::get('posts', 'PostController@index');	
		//resto rutas admin
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
