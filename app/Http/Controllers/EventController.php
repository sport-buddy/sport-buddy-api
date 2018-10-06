<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\User;
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

    public function show(Event $event): Event
    {
        return $event->load('participants');
    }

    public function store(StoreEventRequest $request): Event
    {
        return $this->events->create($request->validated());
    }

    public function participate(Event $event, User $user): Event
    {
        if ($event->hasEmptySpaces() && !$event->isParticipating($user)) {
            $this->events->participate($event, $user);
        }

        return $event->load('participants');
    }
}
