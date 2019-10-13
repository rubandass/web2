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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('tasks');
});

Route::get('/', function () {
    return view('lab2');
});

Route::get('/lab2-1', function () {
    $animalSpecies = array("horse", "dog", "sheep", "flamingo", "hippo");
    return view('lab2-1', compact('animalSpecies'));
});

Route::get('/lab2-2', function () {
    $randomNumber = rand(1,12);
    $favouriteAnimal = array('name'=>'Spot', 'species'=>'dog','breed'=>'collie');
    $number = rand(1,10);
    $animalArray = array('dog','cat','hamster','lion','tiger');
    $randomPetIndex = array_rand($animalArray);
    $animal = $animalArray[$randomPetIndex];
    return view('lab2-2',compact('randomNumber','favouriteAnimal','number','animal'));
});*/

Route::get('/', 'PageController@home');

Route::get('/lab2-1', 'PageController@lab2_1');

Route::get('/lab2-2', 'PageController@lab2_2');

Route::get('/purephp', 'PageController@purephp');

Route::get('/checkpoint2', 'PageController@checkpoint2');

Route::get('/bladeex','PageController@bladeex');