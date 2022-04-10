<?php

namespace App\Http\Services;

use App\Car;
use App\DTO\NewCarDto;
use App\Http\Repositories\CarRepositoryInterface;
use Illuminate\Support\Collection;

class CarService implements CarServiceInterface
{
    /** @var CarRepositoryInterface */
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getUsersCars(int $userId): Collection
    {
        return $this->carRepository->getByUserId($userId);
    }

    public function createNewCar(NewCarDto $newCarDto): void
    {
        $this->carRepository->create($newCarDto);
    }

    public function getById(int $id): Car
    {
        return $this->carRepository->find($id);
    }

    public function delete(int $id): void
    {
        $this->carRepository->delete($id);
    }
}
