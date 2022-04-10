<?php

namespace App\Http\Repositories;

use App\Car;
use App\DTO\NewCarDto;
use Illuminate\Support\Collection;

interface CarRepositoryInterface
{
    public function getByUserId(int $userId): Collection;

    public function create(NewCarDto $newCarDto): void;

    public function find(int $id): Car;

    public function delete(int $id): void;
}
