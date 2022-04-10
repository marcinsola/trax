<?php

namespace App\Http\Repositories;

use App\DTO\NewTripDto;
use Illuminate\Support\Collection;

interface TripRepositoryInterface
{
    public function getByUserId(int $userId): Collection;

    public function create(NewTripDto $newTripDto): void;

    /**
     * FYI: I added an optional $tripId parameter here,
     * because I assumed that IRL project would
     * have an option to update the existing trips.
     */
    public function getPreviousTrips(?int $tripId): Collection;
}
