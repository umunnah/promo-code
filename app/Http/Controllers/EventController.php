<?php

namespace App\Http\Controllers;


use App\Http\Request\StoreEvent;
use App\Http\Response\ApiResponse;
use App\Repositories\EventRepository;
use App\Helpers\Functions\PaginationHelper;

class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository) 
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->eventRepository->getEvents();
        return ApiResponse::sendResponse(PaginationHelper::paginate($events), trans('successful'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent $request)
    {
        $event = $this->eventRepository->save($request->all());
        return ApiResponse::sendResponse($event, "successful", true,201);
    }

   
}
