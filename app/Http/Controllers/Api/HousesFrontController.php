<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;


class HousesFrontController extends Controller
{
    public function index()
    {

        $houses = House::with(['services', 'type', 'user', 'sponsorships'])->get();
        return response()->json($houses);
    }
    public function show($slug)
    {
        $house = House::where("slug", $slug)->with(["type", "services", 'user', 'sponsorships'])->first();
        if (empty($house)) {
            return response()->json(['message' => "No house found"], "404");
        }
        return response()->json($house);
    }
}