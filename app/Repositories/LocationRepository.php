<?php

namespace App\Repositories;

use App\Models\Location;

class LocationRepository extends EloquentRepository
{
    public function __construct(Location $location)
    {
        parent::__construct($location);
    }
}
