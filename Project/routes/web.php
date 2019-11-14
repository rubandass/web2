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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/workouts', 'FormController@workout');
Route::get('/activity', 'FormController@activityEntry');
Route::post('/workouts/storeAcitivy', 'FormController@storeAcitivy');
Route::post('/addActivity', 'FormController@addActivity');
Route::post('/workouts/storeAlcohol', 'FormController@storeAlcohol');
Route::post('/workouts/storeSnack', 'FormController@storeSnack');
Route::post('/workouts/storeSleep', 'FormController@storeSleep');
Route::post('/workouts/storeMood', 'FormController@storeMood');
Route::post('/workouts/storeWeight', 'FormController@storeWeight');
Route::post('/addItem', 'FormController@addItem');
Route::get('/alcohol', 'FormController@alcoholEntry');
Route::get('/snack', 'FormController@snackEntry');
Route::get('/item', 'FormController@itemEntry');
Route::get('/sleep', 'FormController@sleepEntry');
Route::get('/mood', 'FormController@moodEntry');
Route::get('/weight', 'FormController@weightEntry');
Route::get('/calendar', 'FormController@calendar');

