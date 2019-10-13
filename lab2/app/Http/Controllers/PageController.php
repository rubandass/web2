<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function checkpoint2(){
        return view('checkpoint2');
    }
	
	public function home(){
        return view('lab2');
    }

	public function lab2_1(){
		$animalSpecies = array("horse", "dog", "sheep", "flamingo", "hippo");
		return view('lab2-1', compact('animalSpecies'));
    }
	
	public function lab2_2(){
		$randomNumber = rand(1,12);
		$favouriteAnimal = array('name'=>'Spot', 'species'=>'dog','breed'=>'collie');
		$number = rand(1,10);
		$animalArray = array('dog','cat','hamster','lion','tiger');
		$randomPetIndex = array_rand($animalArray);
		$animal = $animalArray[$randomPetIndex];
		return view('lab2-2',compact('randomNumber','favouriteAnimal','number','animal'));
    }	
	
    public function bladeex(){
        $randomNumber = rand(1,12);
        $favouriteAnimal = array('name'=>'Spot', 'species'=>'dog','breed'=>'collie');
        $number = rand(1,10);
        $animalArray = array('dog','cat','hamster','lion','tiger');
        $randomPetIndex = array_rand($animalArray);
        $animal = $animalArray[$randomPetIndex];
        return view('bladeex',compact('randomNumber','favouriteAnimal','number','animal'));
    }
}
