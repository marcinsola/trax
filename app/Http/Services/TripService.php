<?php

namespace App\Http\Services;

use App\DTO\NewTripDto;
use App\Http\Repositories\TripRepositoryInterface;
use App\Trip;
use Illuminate\Support\Collection;

class TripService implements TripServiceInterface
{
    /** @var TripRepositoryInterface */
    private $tripRepository;

    public function __construct(TripRepositoryInterface $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function getUsersTrips(int $userId): Collection
    {
        return $this->tripRepository->getByUserId($userId);
    }

    public function createNewTrip(NewTripDto $newTripDto): void
    {
        $this->tripRepository->create($newTripDto);
    }

    public function calculateTotal(Trip $trip): float
    {
        $sumOfPreviousTrips = $this->tripRepository->getPreviousTrips($trip->id)->sum('miles');

        return $trip->miles + $sumOfPreviousTrips;
    }
}
