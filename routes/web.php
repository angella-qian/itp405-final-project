<?php

Route::get('/', 'RecipesController@index');
Route::get('/recipes', 'RecipesController@index');
Route::get('/create', 'RecipesController@create');
Route::get('/recipes/{id}/edit', 'RecipesController@edit');
Route::get('/recipes/{id}/delete', 'RecipesController@destroy');

Route::get('/details', 'DetailsController@index');

Route::post('/recipes/store', 'RecipesController@store');
Route::post('/recipes/update', 'RecipesController@update');



