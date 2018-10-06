<?php

namespace App\Repositories;

use App\Models\Location;
use Illuminate\Support\Collection;

class LocationRepository extends EloquentRepository
{
    public function __construct(Location $location)
    {
        parent::__construct($location);
    }

    public function findPublic(): Collection
    {
        return $this->query()
            ->with('events')
            ->whereIn('type', [Location::TYPE_BASKETBALL, Location::TYPE_FITNESS])
            ->whereNotNull('lat')
            ->whereNotNull('long')
            ->get()
        ;
    }
}
