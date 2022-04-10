<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'car_id',
        'miles',
    ];

    public function car(): BelongsTo
    {
        // I wanted the user to be able to see all of the trips - even those of a car that was deleted.
        return $this->belongsTo(Car::class)->withTrashed();
    }

    //Just to present understaing of scopes
    public function scopePrevious(Builder $query, ?int $tripId): Builder
    {
        return is_null($tripId)
            ? $query
            : $query->where('id', '<', $tripId);
    }

    public function scopeOfUser(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }
}
