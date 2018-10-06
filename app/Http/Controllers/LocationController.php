<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Repositories\LocationRepository;
use Illuminate\Support\Collection;

class LocationController extends Controller
{
    /**
     * @var LocationRepository
     */
    private $locations;

    public function __construct(LocationRepository $locations)
    {
        $this->locations = $locations;
    }

    public function index(): Collection
    {
        return $this->locations->findPublic();
    }

    public function show(Location $location): Location
    {
        return $location->load('events');
    }
}
