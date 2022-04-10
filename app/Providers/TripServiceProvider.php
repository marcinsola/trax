<?php

namespace App\Providers;

use App\Http\Repositories\TripRepository;
use App\Http\Repositories\TripRepositoryInterface;
use App\Http\Services\TripService;
use App\Http\Services\TripServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TripServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $bindings = [
        TripServiceInterface::class => TripService::class,
        TripRepositoryInterface::class => TripRepository::class
    ];

    public function provides()
    {
        return [TripServiceInterface::class, TripRepositoryInterface::class];
    }
}
