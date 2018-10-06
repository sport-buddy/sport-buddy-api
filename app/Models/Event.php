<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $category_id
 * @property int $location_id
 * @property string $name
 * @property string $comment
 * @property int $min_participants
 * @property int $max_participants
 * @property \Illuminate\Support\Carbon $start_at
 * @property \Illuminate\Support\Carbon $end_at
 *
 * @property Category $category
 * @property Location $location
 */
class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'comment', 'min_participants', 'max_participants', 'start_at', 'end_at',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'start_at', 'end_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
