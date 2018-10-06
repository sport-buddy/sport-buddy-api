<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string type
 * @property string address
 * @property string district
 * @property float $lat
 * @property float $long
 * @property \Illuminate\Support\Collection $properties
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Location extends Model
{
    const TYPE_BASE = 'base';
    const TYPE_FITNESS = 'fitness';
    const TYPE_BASKETBALL = 'basketball';

    /**
     * @var array
     */
    protected $fillable = [
        'type', 'address', 'district', 'lat', 'long', 'properties',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'properties' => 'collection',
    ];
}
