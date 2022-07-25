<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/houses', 'Api\HousesFrontController@index');
Route::get('/sponsorships', 'Api\HousesFrontController@index');
Route::get('/houses/{slug}', 'Api\HousesFrontController@show');
Route::get('/services', 'Api\ServicesController@index');
Route::get('/messages', 'Api\MessageController@show');
Route::get('/search', 'Api\SearchController@search');
Route::get('/orders/generate', 'Api\Orders\OrderController@generate');
Route::post('/orders/makePayment', 'Api\Orders\OrderController@makePayment');




//rotta salvataggio Messaggi
Route::post('/messages', 'Api\MessageController@store');