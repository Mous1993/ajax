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

Route::get('/', function () {
    return view('welcome');
});

Route::get('menu', function () {
	return view('menu');
});

Route::get('list','ListController@index');
Route::post('list','ListController@create');
Route::post('delete','ListController@delete');
Route::post('update','ListController@update');

Route::get('search','ListController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
