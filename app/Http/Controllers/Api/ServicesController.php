<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;


class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with([])->get();
        return response()->json($services);
    }
}