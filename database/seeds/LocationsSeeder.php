<?php

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LocationsSeeder extends Seeder
{
    const PATH_VENDOR = 'tautvydasr/laisvalaikio-zonos/json/';

    public function run(): void
    {
        foreach ([Location::TYPE_BASKETBALL, Location::TYPE_BASE, Location::TYPE_FITNESS] as $type) {
            $this->seedLocation($type);
        }
    }

    private function seedLocation(string $type): void
    {
        foreach ($this->getJson($type) as $json) {
            $this->saveLocation($type, $json);
        }
    }

    private function saveLocation(string $type, array $data): void
    {
        $location = new Location(array_only($data, ['district', 'address']));
        $location->type = $type;
        $location->properties = array_except($data, ['id', 'district', 'address']);
        $location->saveOrFail();
    }

    private function getJson(string $type): array
    {
        return json_decode(Storage::disk('vendor')->get(self::PATH_VENDOR . $type . '.json'), true);
    }
}
