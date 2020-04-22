<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/filme');

Route::get('/filme', 'MoviesController@index')->name('movies.index');
Route::get('/filme/{film}', 'MoviesController@show')->name('movies.show');

Route::get('/seriale', 'TvController@index')->name('tv.index');
Route::get('/seriale/{serial}', 'TvController@show')->name('tv.show');

Route::get('/actori', 'ActorsController@index')->name('actors.index');
Route::get('/actori/pagina/{pagina?}', 'ActorsController@index');
Route::get('/actori/{actor}', 'ActorsController@show')->name('actors.show');
