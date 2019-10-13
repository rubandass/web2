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

Route::get('/timetable', function () {
    return view('timetable');
});

Route::get('/photos', function () {
    return view('photos');
});

Route::get('/lab4', function () {
    return view('lab4');
});

Route::get('/lab4-2', function () {
    return view('lab4-2');
});

Route::get('/lab4-3', function () {
    return view('lab4-3');
});
