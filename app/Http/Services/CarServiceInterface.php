<?php

namespace App\Http\Services;

use App\Car;
use App\DTO\NewCarDto;
use Illuminate\Support\Collection;

interface CarServiceInterface
{
    public function getUsersCars(int $userId): Collection;

    public function createNewCar(NewCarDto $newCarDto): void;

    public function getById(int $id): Car;

    public function delete(int $id): void;
}
