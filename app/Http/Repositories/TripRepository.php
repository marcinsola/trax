<?php

namespace App\Http\Repositories;

use App\Trip;
use App\DTO\NewTripDto;
use Illuminate\Support\Collection;

class TripRepository implements TripRepositoryInterface
{
    public function getByUserId(int $userId): Collection
    {
        return Trip::ofUser($userId)->get();
    }

    public function create(NewTripDto $newTripDto): void
    {
        Trip::create($newTripDto->toArray());
    }

    public function getPreviousTrips(?int $tripId): Collection
    {
        return Trip::previous($tripId)->get();
    }
}
