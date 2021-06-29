<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Functions\Coordinate;

class EventRepository extends BaseRepository 
{
    public function __construct(Event $model, Request $request)
    {
        parent::__construct($model, $request);
    }

    public function save(array $data): Event 
    {
        $coordinate = new Coordinate();
        $lat = $coordinate->getCoordinates($data['address']);
        // dd($lat);
    
        return $this->create($data);
    }
}