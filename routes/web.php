<?php

//Route::get('posts', 'PostController@show')->name('show');

Route::get('/', 'PagesController@home');


Route::group([
		'prefix' => 'admin',
		'namespace' => 'Admin', 
		'middleware' => 'auth'], 
	function (){
		//Route::get('admin', 'AdminController@index')->name('admin');
		//esto es igual a lo de abajo, al meterlo aquí se entraría con admin/admin y no
		Route::get('/', 'AdminController@index')->name('admin');
		Route::get('posts', 'PostController@index')->name('admin.posts.index');	

		//resto rutas admin
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
