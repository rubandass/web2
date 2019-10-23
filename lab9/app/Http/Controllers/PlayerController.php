<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Country;
use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Getting all the values from the Player object
        $query = Player::query();
        //Getting all form values as key => value pair into an array.
        $conditions = collect([]);
        $conditions->push($request->only(['name', 'age', 'role', 'batting', 'bowling', 'min_odi_runs', 'max_odi_runs', 'country_id']));
        //Checking all the fields are not null and search from the Player object according to the conditions
        //This check is for whether the $request contains values or not. (Search -> No values, players -> values)
        if (sizeof($conditions[0]) > 0) {
            if ($conditions[0]["name"] != null) {
                $query = $query->where('name', 'like', '%' . $conditions[0]["name"] . '%');
            }
            if ($conditions[0]["age"] != null) {
                $query = $query->where('age', $conditions[0]["age"]);
            }
            if ($conditions[0]["role"] != null) {
                $query = $query->where('role', $conditions[0]["role"]);
            }
            if ($conditions[0]["batting"] != null) {
                $query = $query->where('batting', $conditions[0]["batting"]);
            }
            if ($conditions[0]["bowling"] != null) {
                $query = $query->where('bowling', $conditions[0]["bowling"]);
            }
            if ($conditions[0]["min_odi_runs"] != null || $conditions[0]["max_odi_runs"] != null) {

                $min = (int) $conditions[0]["min_odi_runs"];
                $max = (int) $conditions[0]["max_odi_runs"];
                if ($conditions[0]["max_odi_runs"] == null) {
		    $query = $query->where('odiRuns', '>=', $min);
                } 
		else {
                    $query = $query->whereBetween('odiRuns', [$min, $max]);
		}
            }
            if ($conditions[0]["country_id"] != null) {
                $query = $query->where('country_id', $conditions[0]["country_id"]);
            }
        }
        $players = $query->get()->sortBy('name');
        $countries = Country::all()->sortBy('name');
        $bowlingStyles = Player::distinct()->pluck('bowling')->sort();
        $roles = Player::distinct()->pluck('role')->sort();
        $battingStyles = Player::distinct()->pluck('batting')->sort();
        return view('player', compact('players', 'countries','bowlingStyles','roles','battingStyles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'age' => 'required|numeric|min:17|max:50',
            'role' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'batting' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'bowling' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'odi_runs' => 'required|numeric',
            'country_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'result' => 'failed',
                'errors' => $validatedData->getMessageBag()->toArray()
            ]);
        }
        $player = new Player();
        $player->name = request('name');
        $player->age = request('age');
        $player->role = request('role');
        $player->batting = request('batting');
        $player->bowling = request('bowling');
        $player->odiRuns = request('odi_runs');
        $player->country_id = request('country_id');

        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
            $player->image = $path;
        }
        $player->save();

        return response()->json([
            'result' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'age' => 'required|numeric|min:17|max:50',
            'role' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'batting' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'bowling' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'odi_runs' => 'required|numeric',
            'country_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'result' => 'failed',
                'errors' => $validatedData->getMessageBag()->toArray()
            ]);
        }

        $player = Player::find($id);
        $player->name = request('name');
        $player->age = request('age');
        $player->role = request('role');
        $player->batting = request('batting');
        $player->bowling = request('bowling');
        $player->odiRuns = request('odi_runs');
        $player->country_id = request('country_id');

        if ($request->hasFile('image')) {
            Storage::delete($player->image);
            $path = $request->image->store('images');
            $player->image = $path;
        }

        $player->save();
        return response()->json([
            'result' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect('/players');
    }

    public function customDelete(Request $request)
    {
	$playerIds = explode(",",request('ids'));
	foreach($playerIds as $playerId)
	{
	$player = Player::find($playerId);
        $player->delete();
	}
        
        return redirect('/players');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }
}
