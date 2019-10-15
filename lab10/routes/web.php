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

use App\Http\Controllers\PageController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PageController@index' );
Route::post('/', 'PageController@data' );
