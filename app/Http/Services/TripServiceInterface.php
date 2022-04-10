<?php

namespace App\Http\Services;

use App\DTO\NewTripDto;
use App\Trip;
use Illuminate\Support\Collection;

interface TripServiceInterface
{
    public function getUsersTrips(int $userId): Collection;

    public function createNewTrip(NewTripDto $newTripDto): void;

    public function calculateTotal(Trip $trip): float;
}
