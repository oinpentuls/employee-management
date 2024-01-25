<?php

namespace App\Providers;

use App\Repositories\DepartmentRepository;
use App\Services\DepartmentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(DepartmentService::class, function() {
        //     return new DepartmentService(new DepartmentRepository());
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
