<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Helpers\Functions\Coordinate;

class EventRepository extends BaseRepository 
{
    const Paginate = 10;
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

    public function getEvents() 
    {
    	$perPage = ($this->request->query('paginate')) ? $this->request->query('paginate'): self::Paginate;
        $status = $this->request->query('status');
        return $this->model
            ->when($this->request->query('status'),function ($query) use($status) {
                return $query->where('status',$status);
            })
            ->latest()->paginate($perPage);
    }
}