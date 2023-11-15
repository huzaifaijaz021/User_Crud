<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\EmployeeService;
use App\Repositories\EmployeeRepository;


class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeService::class, EmployeeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
