<?php

namespace App\Http\Controllers;

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
}
