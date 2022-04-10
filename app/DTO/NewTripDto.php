<?php

namespace App\DTO;

use App\Http\Requests\NewTripRequest;
use Carbon\Carbon;

class NewTripDto
{
    /** @var int $userId */
    private $userId;

    /** @var string $date */
    private $date;

    /** @var int $carId */
    private $carId;

    /** @var float $miles */
    private $miles;

    private function __construct(int $userId, string $date, int $carId, float $miles)
    {
        $this->userId = $userId;
        $this->date = $date;
        $this->carId = $carId;
        $this->miles = $miles;
    }

    public static function fromRequest(NewTripRequest $request): self
    {
        return new self($request->user()->id, $request->input('date'), $request->input('car_id'), $request->input('miles'));
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'date' => new Carbon($this->date),
            'car_id' => $this->carId,
            'miles' => $this->miles,
        ];
    }
}
