<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;


class HousesFrontController extends Controller
{
    public function index(){

        $houses = House::with(['services','type'])->get();
        return response()->json($houses);
        }
}
