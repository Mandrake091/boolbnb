<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
  public function search(Request $request)
  {
    // $post = DB::table('houses')
    // ->where('city', 'Roma')
    // ->where('houses.id' , '>' , '12')
    // ->with(['services','type', 'user'])
    // ->get();
    // return response()->json($post);

    // // $post = DB::table('houses')
    // // ->join('services', 'houses.id', '=', 'services.id')
    // // ->get();
    // // return response()->json($post);


    $data = $request->all();
    $indirizzo_inserito_utente = isset($data['indirizzo']) ? $data['indirizzo'] : '';

    $geoCode = Http::get("https://api.tomtom.com/search/2/geocode/" . $indirizzo_inserito_utente . ".json?key=HnmOys7lX8qXGsZCcgH6WXEgs8UWaSAh&storeResult=false&typeahead=false&limit=10&ofs=0")->json();




    $lat = $geoCode['results']['0']['position']['lat'];
    $lon = $geoCode['results']['0']['position']['lon'];
    $max_lat = $geoCode['results']['0']['position']['lat'] + 0.18;
    $min_lat = $geoCode['results']['0']['position']['lat'] - 0.18;
    $max_lon = $geoCode['results']['0']['position']['lon'] + 0.18;
    $min_lon = $geoCode['results']['0']['position']['lon'] - 0.18;
    $numero_stanze = isset($data['n_room']) ? $data['n_room'] : 0;
    $numero_letti = isset($data['n_bed']) ? $data['n_bed'] : 0;
    $numero_bagni = isset($data['n_bathroom']) ? $data['n_bathroom'] : 0;
    $prezzo_min = isset($data['night_price']) ? $data['night_price'] : 0;
    $prezzo_max = isset($data['night_price']) ? $data['night_price'] : 1000;
    $tipo = isset($data['type']) ? $data['type'] : ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
    $selectedServices = isset($data['services']) ? $data['services'] : [];
    // $citta = isset($data['city']) ? $data['city'] : 'Surbo';
    // $state = isset($data['state']) ? $data['state'] : 'Italia';
    // $indirizzo = isset($data['address']) ? $data['address'] : 'Via Papa Luciani';



    $apartments = House::with(['services', 'type'])

      ->where('latitude', '<=', $max_lat)
      ->where('latitude', '>=', $min_lat)
      ->where('longitude', '<=', $max_lon)
      ->where('longitude', '>=', $min_lon)
      ->where('n_room', '>=', $numero_stanze)
      ->where('n_bed', '>=', $numero_letti)
      ->where('n_bathroom', '>=', $numero_bagni)
      ->where('night_price', '>=', $prezzo_min)
      ->where('night_price', '<=', $prezzo_max)
      ->whereIn('type_id', $tipo)
      ->where(function ($query) use ($selectedServices) {
        foreach ($selectedServices as $service) {
          dd($selectedServices);
          -$query->whereHas('services', function ($query) use ($service) {
            $query->where('name', $service);
            dump($query);
          });
        }
      })

      ->get();





    return response()->json($apartments);
  }
}