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
Route::get('/',function(){
    return view('welcome');
});

Route::resource('films',"FilmController");
Route::delete('films/force/{film}', 'FilmController@forceDestroy')->name('films.force.destroy');
Route::put('films/restore/{film}', 'FilmController@restore')->name('films.restore');
