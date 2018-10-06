<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Support\Collection;

class EventController extends Controller
{
    /**
     * @var EventRepository
     */
    private $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    public function index(): Collection
    {
        return $this->events->findAll();
    }

    public function store(StoreEventRequest $request): Event
    {
        return $this->events->create($request->validated());
    }
}
