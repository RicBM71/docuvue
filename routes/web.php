<?php

//Route::get('posts', 'PostController@show')->name('show');

Route::get('/', 'PagesController@home');
Route::get('blog/{id}', 'PostsController@show');


Route::group([
		'prefix' => 'admin',
		'namespace' => 'Admin', 
		'middleware' => 'auth'], 
	function (){
		//Route::get('admin', 'AdminController@index')->name('admin');
		//esto es igual a lo de abajo, al meterlo aquí se entraría con admin/admin y no
		Route::get('/', 'AdminController@index')->name('admin');
		Route::get('posts', 'PostsController@index')->name('admin.posts.index');	
		Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');	
		Route::post('posts/store', 'PostsController@store')->name('admin.posts.store');	
		Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');	
		Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');	

		//resto rutas admin
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
