<?php

namespace App\Http\Controllers;

use App\DTO\NewCarDto;
use App\Http\Requests\NewCarRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarCollection;
use App\Http\Services\CarServiceInterface;

class CarController extends Controller
{
    /** @var CarServiceInterface $carService */
    private $carService;

    // Workspace's PHP version is 7.3 - I would use a shorthand
    // constructor notation if it was 8.0
    public function __construct(CarServiceInterface $carService)
    {
        $this->carService = $carService;
    }

    public function index(Request $request)
    {
        return new CarCollection(
            $this->carService->getUsersCars($request->user()->id)
        );
    }

    public function store(NewCarRequest $request): void
    {
        $this->carService->createNewCar(NewCarDto::fromRequest($request));
    }

    // I intentionally didn't use model binding to not
    // sacrifice the elasticity of the solution and
    // stick to the layered architecture
    public function show(int $id): CarResource
    {
        return new CarResource(
            $this->carService->getById($id)
        );
    }

    public function destroy(int $id): void
    {
        $this->carService->delete($id);
    }
}
