<?php

namespace App\Http\Repositories;

use App\Car;
use App\DTO\NewCarDto;
use Illuminate\Support\Collection;

class CarRepository implements CarRepositoryInterface
{
    public function getByUserId(int $userId): Collection
    {
        return Car::ofUser($userId)->get();
    }

    public function create(NewCarDto $newCarDto): void
    {
        Car::create($newCarDto->toArray());
    }

    public function find(int $id): Car
    {
        return Car::find($id);
    }

    public function delete(int $id): void
    {
        Car::where('id', $id)->delete();
    }
}
