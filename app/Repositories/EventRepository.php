<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Collection;

class EventRepository extends EloquentRepository
{
    public function __construct(Event $event)
    {
        parent::__construct($event);
    }

    public function findAll(): Collection
    {
        return $this->query()->with('participants')->get();
    }

    public function participate(Event $event, User $user): void
    {
        $event->participants()->attach($user);
    }
}
