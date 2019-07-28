<?php

namespace App\Http\Controllers\API;

use App\Models\BrewMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrewMethodsController extends Controller
{
    public function getBrewMethods()
    {
        $brewMethods = BrewMethod::withCount('cafes')->get();
        return response()->json($brewMethods);
    }
}
