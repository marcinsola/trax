<?php

namespace App\Http\Controllers;

use App\DTO\NewTripDto;
use App\Http\Requests\NewTripRequest;
use App\Http\Resources\TripCollection;
use App\Http\Services\TripServiceInterface;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /** @var TripServiceInterface $tripService */
    private $tripService;

    // Workspace's PHP version is 7.3 - I would use a shorthand
    // constructor notation if it was 8.0
    public function __construct(TripServiceInterface $tripService)
    {
        $this->tripService = $tripService;
    }

    public function index(Request $request)
    {
        return new TripCollection(
            $this->tripService->getUsersTrips($request->user()->id)
        );
    }

    public function store(NewTripRequest $request): void
    {
        $this->tripService->createNewTrip(NewTripDto::fromRequest($request));
    }
}
