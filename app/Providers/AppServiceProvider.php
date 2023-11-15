<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Interface\EmployeeInterface;
use App\Repositories\StaffRepository;
use App\Interface\StaffInterface;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
        $this->app->bind(StaffInterface::class, StaffRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
