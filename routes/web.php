<?php

// Route::auth();

Route::get('/signup', 'SignUpController@index');
Route::post('/signup', 'SignUpController@signup');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/', 'RecipesController@index');
Route::get('/recipes', 'RecipesController@index');

Route::get('/details', 'DetailsController@index');

Route::middleware(['authenticated'])->group(function() {
	Route::get('/create', 'RecipesController@create');
	Route::get('/recipes/{id}/edit', 'RecipesController@edit');
	Route::get('/recipes/{id}/delete', 'RecipesController@destroy');

	Route::post('/recipes/store', 'RecipesController@store');
	Route::post('/recipes/update', 'RecipesController@update');

	Route::get('/profile', 'AdminController@index');

});
