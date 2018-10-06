<?php

namespace App\Services;

use Illuminate\Contracts\Config\Repository as Config;

class Geocoder
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getCoordinatesFromAddress(string $address): array
    {
        return array_get($this->getGeoResponse($address), 'results.0.geometry.location', []);
    }

    private function getGeoResponse(string $address): array
    {
        $url = $this->config->get('services.google.geo_uri') . http_build_query([
            'key' => $this->config->get('services.google.key'),
            'address' => $address,
        ]);

        return json_decode(file_get_contents($url), true);
    }
}
