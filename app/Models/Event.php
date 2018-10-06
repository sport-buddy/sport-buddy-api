<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

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
 * @property User[]|\Illuminate\Support\Collection $participants
 */
class Event extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'location_id',
        'name',
        'comment',
        'min_participants',
        'max_participants',
        'start_at',
        'end_at',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'start_at',
        'end_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'min_participants' => 'int',
        'max_participants' => 'int',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_participants');
    }

    public function hasEmptySpaces(): bool
    {
        return $this->participants->count() < $this->max_participants;
    }

    public function isParticipating(User $user): bool
    {
        return $this->participants()->where('id', $user->id)->exists();
    }

    protected function setStartAtAttribute($value): void
    {
        $this->attributes['start_at'] = $value ? Carbon::createFromFormat('Y-m-d H:i', $value) : null;
    }

    protected function setEndAtAttribute($value): void
    {
        $this->attributes['end_at'] = $value ? Carbon::createFromFormat('Y-m-d H:i', $value) : null;
    }
}
