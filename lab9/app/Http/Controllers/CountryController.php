<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('country', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25|unique:countries,name',
            'flag' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'result' => 'failed',
                'errors' => $validatedData->getMessageBag()->toArray()
            ]);
        }
        $country = new Country();
        $country->name = request('name');
        if ($request->hasFile('flag')) {
            $path = $request->flag->store('images');
            $country->flag = $path;
        }
        $country->save();

        return response()->json([
            'result' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$country = Country::find($id);
        //return view('edit_country', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:25',
            'flag' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'result' => 'failed',
                'errors' => $validatedData->getMessageBag()->toArray()
            ]);
        }
        $country = Country::find($id);

        $country->name = request('name');
        if ($request->hasFile('flag')) {
            Storage::delete($country->flag);
            $path = $request->flag->store('images');
            $country->flag = $path;
        }

        $country->save();
        return response()->json([
            'result' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect('/countries');
    }
}
