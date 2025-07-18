<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
