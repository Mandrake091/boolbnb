<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\House;
use App\Message;
use App\Service;
use App\User;
use App\Type;
use App\Sponsorship;
use Illuminate\Support\Facades\Auth;
use App\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use LDAP\Result;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sponsorships = Sponsorship::all();
        // $houses = House::all();
        // return view('admin.sponsorship.create', compact('sponsorships', 'houses'));




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // $newSponsorship = new Sponsorship();
        // $newSponsorship->house_id = '8';
        // $newSponsorship->sponsorship_id = '2';
        // // $newSponsorship->sponsorships()->sync($data['sponsorships']);
        // if (isset($data['sponsorships'])) {
        //     $newSponsorship->sponsorships()->sync($data['sponsorships']);
        // }

        // $newSponsorship->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {

        
        return view('admin.sponsorships.show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house, $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
  
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}