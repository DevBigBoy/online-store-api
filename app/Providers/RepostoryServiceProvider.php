<?php

namespace App\Providers;

use App\Http\Interfaces\Auth\AuthInterface;
use App\Http\Interfaces\Product\ProductInterface;
use App\Http\Repositories\Auth\AuthRepository;
use App\Http\Repositories\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepostoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthInterface::class,
            AuthRepository::class,
        );

        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
