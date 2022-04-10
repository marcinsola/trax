<?php

namespace App\Providers;

use App\Http\Repositories\CarRepository;
use App\Http\Repositories\CarRepositoryInterface;
use App\Http\Services\CarService;
use App\Http\Services\CarServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $bindings = [
        CarServiceInterface::class => CarService::class,
        CarRepositoryInterface::class => CarRepository::class
    ];

    public function provides()
    {
        return [CarServiceInterface::class, CarRepositoryInterface::class];
    }
}
