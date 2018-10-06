<?php

namespace App\Console\Commands;

use App\Models\Location;
use App\Repositories\LocationRepository;
use App\Services\Geocoder;
use Illuminate\Console\Command;

class MapAddressCoordinates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:location:coordinates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Map existing locations with coordinates';

    /**
     * @var LocationRepository
     */
    private $locations;
    /**
     * @var Geocoder
     */
    private $geo;

    public function __construct(LocationRepository $locations, Geocoder $geo)
    {
        parent::__construct();
        $this->locations = $locations;
        $this->geo = $geo;
    }

    public function handle(): void
    {
        /** @var Location $location */
        foreach ($this->locations->findAll() as $location) {
            $coordinates = $this->geo->getCoordinatesFromAddress($location->address);

            if (empty($coordinates)) {
                continue;
            }

            $location->lat = $coordinates['lat'];
            $location->long = $coordinates['lng'];
            $location->saveOrFail();
            $this->output->writeln("{$location->address} solved to: {$location->lat}, {$location->long}");
        }
    }
}
