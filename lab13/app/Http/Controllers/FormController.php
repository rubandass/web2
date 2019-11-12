<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\User;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->name = $request->get('name');
        //dd($pet);
        //owner id is the current user's id
        $pet->owner_id = auth()->id();
        $pet->save();
        return redirect('list')->with('success', 'Pet has been added');
    }

    public function list()
    {
        $pets = Pet::where('owner_id',auth()->id())->get();
        //current user's name
        $user = auth()->user();
        return view('list',compact('pets'));
    }

    public function listAll()
    {
        $pets = Pet::all();
        $users = User::all();
        return view('listAll',compact('pets','users'));
    }

    public function createPet()
    {
        return view('createPet');
    }
}
