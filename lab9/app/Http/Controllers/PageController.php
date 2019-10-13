<?php

namespace App\Http\Controllers;

use App\Country;
use App\Player;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('layout');
    }

    public function country()
    {
        $countries = Country::all();
        $players = Player::all();
        return view('country', compact('countries', 'players')); 
    }

    public function searchPlayers()
    {
        $roles = Player::distinct()->pluck('role')->sort();
        return view('searchPage', compact('roles'));
    }

    public function showPlayers()
    {
        $selectedRole = request()->input('role');
        //Checking the players role
        if ($selectedRole == "Show All") 
        {
            $result = Player::all()->sortBy('name');
        } 
        else
        {
            $result = Player::where('role', '=', $selectedRole)->get()->sortBy('name');
        }
        return view('showPlayersPage', compact('result'));
    }

    public function fileReadCSV($fileName)
    {
        //$filename = 'public/cricket.csv';
        // The nested array to hold all the arrays
        $complete = [];
        // Open the file for reading
        if (($handle = fopen("$fileName", "r")) !== FALSE) {
            // Each line in the file is converted into an individual array that we call $row
            // The items of the array are comma separated
            //reading the first line and store it an array as headers.
            $header = fgetcsv($handle, ","); 
            while (($row = fgetcsv($handle, ",")) !== FALSE) {
                // Each individual array is being pushed into the nested array
                $complete[] = array_combine($header,$row);
            }
            // Close the file
            fclose($handle);
        }
        return json_encode($complete);
    }

}
