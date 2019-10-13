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

Route::get('/', 'FormController@showOlympic');
Route::post('/olympics', 'FormController@processOlympic');

Route::post('/olympics', 'FormController@mark');

Route::get('/fruit', 'FormController@showFruit');
Route::post('/fruit', 'FormController@processFruit');

Route::get('/fruit2', 'FormController@showFruit2');
Route::post('/fruit2', 'FormController@processFruit2');

/*
Route::post('/olympics', function () {
    return view('olympics');
});

Route::get('/fruit', function () {
    return view('fruit');
});

Route::post('/fruit', function () {
    return view('fruits');
});
*/