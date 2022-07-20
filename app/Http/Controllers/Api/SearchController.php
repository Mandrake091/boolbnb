<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;
use Illuminate\Support\Facades\DB;

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
    $numero_stanze = isset($data['n_room']) ? $data['n_room'] : 0;
    $numero_letti = isset($data['n_bed']) ? $data['n_bed'] : 0;
    $numero_bagni = isset($data['n_bathroom']) ? $data['n_bathroom'] : 0;
    $prezzo_min = isset($data['night_price']) ? $data['night_price'] : 15;
    $prezzo_max = isset($data['night_price']) ? $data['night_price'] : 30;
    $tipo = isset($data['type']) ? $data['type'] : 7;
    $selectedServices = isset($data['services']) ? $data['services'] : ['Piscina', 'Wi-Fi'];
    // $citta = isset($data['city']) ? $data['city'] : 'Surbo';
    // $state = isset($data['state']) ? $data['state'] : 'Italia';
    // $indirizzo = isset($data['address']) ? $data['address'] : 'Via Papa Luciani';

    
    
      $apartments = House::with(['services'])
        // ->join('house_service', 'houses.id', '=', 'house_service.house_id')
        //  ->join('house_service', 'houses.id', '=', 'house_service.house_id')
      ->where('n_room','>=', $numero_stanze)
      ->where('n_bed','>=', $numero_letti)
      ->where('n_bathroom','>=', $numero_bagni)
        ->where('night_price','>=', $prezzo_min)
        ->where('night_price','<=', $prezzo_max)
        ->where('type_id','=', $tipo)
        // ->whereHas('services', function($query) use ($selectedServices) {
        //     $query->whereIntegerInRaw('name', $selectedServices);
        // })
        // ->whereHas('services', function($query) use ($selectedServices) {
        //     foreach ($selectedServices as $service) {
        //         $query->where('name', $service);
        //     }
            
        // })
        ->where(function($query) use ($selectedServices) {
            foreach ($selectedServices as $service) {
                $query->whereHas('services', function($query) use ($service) {
                    $query->where('name', $service);
                });
            }
        })
        
      ->get();

      


    
     return response()->json($apartments);


        }
    }
