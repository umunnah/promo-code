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

Route::prefix('v1')->group(function () {
    
    Route::post('/users','UserController@store');
    // event routes
    Route::post('/events','EventController@store');
    Route::get('/events', 'EventController@index');

    // promo routes
    Route::post('/promos', 'PromoController@store');
    Route::get('/promo-codes', 'PromoController@index');
    Route::patch('/promo/{promoId}/de-activate', 'PromoController@deActivate');
    Route::patch('/promo/{promoId}/radius', 'PromoController@updateRadius');
});
