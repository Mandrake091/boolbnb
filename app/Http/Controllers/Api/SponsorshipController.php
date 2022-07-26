<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;

class SponsorshipController extends Controller
{
    public function index()
    {
        $sponsorships = Sponsorship::with([])->get();
        return response()->json($sponsorships);
    }
}