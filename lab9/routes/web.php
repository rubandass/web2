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
/*
Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', 'PageController@index');
Route::get('/country', 'PageController@country');*/


Route::get('/', 'HomeController@home');
Route::resource('/countries', 'CountryController');
Route::resource('/players', 'PlayerController');
Route::post('/deletePlayers', 'PlayerController@customDelete');

