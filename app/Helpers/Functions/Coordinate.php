<?php


namespace App\Helpers\Functions;

use Illuminate\Support\Facades\Http;


class Coordinate
{
    public function getCoordinates(string $address) 
    {
        // $url='http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false';
        // $source = file_get_contents($url);
        $response = Http::get("http://maps.googleapis.com/maps/api/geocode/json",[
            'address' => $address,
            'sensor' => false,
        ]);
        $obj = $response->json();
        return $obj;
        // return $obj->geometry->location;
    }

}