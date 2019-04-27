<?php

Route::get('/', 'RecipesController@index');
Route::get('/recipes', 'RecipesController@index');
Route::get('/create', 'RecipesController@create');
Route::get('/recipes/{id}/edit', 'RecipesController@edit');

Route::get('/recipes/convert-units', 'UnitsController@index');
Route::get('/details', 'DetailsController@index');

Route::post('/recipes', 'RecipesController@store');

