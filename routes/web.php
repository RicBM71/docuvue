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
		Route::get('posts/create', 'PostController@create')->name('admin.posts.create');	
		Route::post('posts/store', 'PostController@store')->name('admin.posts.store');	

		//resto rutas admin
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
