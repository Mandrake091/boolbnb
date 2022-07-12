<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\House;
use App\Message;
use App\Service;
use App\User;
use App\Type;
use App\Sponsorship;
use App\View;
use Illuminate\Support\Facades\Http;

class HouseController extends Controller
{
    protected $validationRule = [
        // "title" => "required|string|max:100",
        // "content" => "required",
        // "visibility" => "sometimes|accepted",
        // "type_id" => "nullable|exists:type,id",
        // "image" => "nullable|image|mimes:jpeg,bmp,png,svg,jpg|max:2048",
        // 'services'=> "nullable|exists:services,id"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.houses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $services = Service::all();
        $sponsorships = Sponsorship::all();
        return view('admin.houses.create', compact('types', 'services', 'sponsorships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newHouse = new House();
        $newHouse->title = $data['title'];
        $newHouse->slug = $this->getSlug($newHouse->title);
        $newHouse->description = $data['description'];
        $newHouse->visibility  = isset($data['visibility']);// true o false
        $newHouse->type_id = $data['type_id'];
        $newHouse->night_price = $data['night_price'];
        $newHouse->n_room = $data['n_room'];
        $newHouse->n_bed = $data['n_bed'];
        $newHouse->n_bathroom = $data['n_bathroom'];
        $newHouse->square_meters = $data['square_meters'];
        $newHouse->check_in = $data['check_in'];
        $newHouse->check_out = $data['check_out'];

        $newHouse->state = $data['state'];
        $newHouse->city = $data['city'];
        $newHouse->address = $data['address'];
        $geoCode = Http::get('https://api.tomtom.com/search/2/geocode/via-papa-luciani-10-73010-surbo.json?key=HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh&storeResult=false&typeahead=false&limit=10&ofs=0')->json();

        $newHouse->latitude = $data['latitude'];
        $newHouse->longitude = $data['longitude'];
        $newHouse->user_id = auth()->user()->id;

        if( isset($data['image']) ) {
            $path_image = Storage::put("uploads", $data['image']); // uploads/nomeimg.jpg
            $newHouse->image = $path_image;
        }
        
        $newHouse->save();

        if(isset($data['services'])) {
            $newHouse->services()->sync($data['services']);
        }

        return redirect()->route('admin.posts.show',$newHouse->id);
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
        //
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
        //
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

     private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        // Prendi il primo post il cui slug è uguale a $slug
        // se è presente allora genero un nuovo slug aggiungendo -$count
        while( House::where("slug", $slug)->first() ) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }

        return $slug;
    }
}