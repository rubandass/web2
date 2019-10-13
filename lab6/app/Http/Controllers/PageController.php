<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use App\Breed;

class PageController extends Controller
{
    public function index()
    {
        $dogsList = Dog::all();
        //$results = Breed::where('name', '=','Labrador Retriever')->get();
        //$breed = Breed::find(1);
        $breed = Breed::where('name', '=', 'Labrador Retriever')->first();
        $resultDogs = $breed->dogs;
        $breedNames = Breed::pluck('name');
        $retrieverBreed = Breed::where('name', 'like', '%Retriever%')->get();
        $dogsbefore2010 = Dog::where('date_of_birth' , '<', '2010')->get();
        $notRetrievers = Breed::where('name' , 'NOT LIKE' , '%Retriever%')->orderBy('name')->get();
        return view('dogs', compact('dogsList', 'resultDogs', 'breedNames', 'retrieverBreed' , 'dogsbefore2010' , 'notRetrievers'));
    }
}
