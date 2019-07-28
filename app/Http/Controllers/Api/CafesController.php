<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCafeRequest;
use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Utilities\GaodeMaps;

class CafesController extends Controller
{
    public function getCafes()
    {
        $cafes = Cafe::with('brewMethods')->get();
        return response()->json($cafes);
    }

    public function getCafe($id)
    {
        $cafe = Cafe::where('id','=',$id)->with('brewMethods')->first();
        return response()->json($cafe);
    }

    public function postNewCafe(StoreCafeRequest $request)
    {
        $cafe = new Cafe();
        $cafe->name = $request->name;
        $cafe->address  = $request->address;
        $cafe->city     = $request->city;
        $cafe->state    = $request->state;
        $cafe->zip      = $request->zip;

        $coodrinates = GaodeMaps::geocodeAddress($cafe->address,$cafe->city,$cafe->state);
        $cafe->latitude = $coodrinates['lat'];
        $cafe->longitude = $coodrinates['lng'];
        $cafe->save();

        return response()->json($cafe, 201);
    }

}
