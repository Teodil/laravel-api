<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Repositories\ProductRepository;
use App\Repositories\ReviewRepository;
use App\Services\ProductService;
use App\Services\ReviewService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProductRepository::class, function ($app) {
            return new ProductRepository($app->make(Product::class));
        });
        $this->app->bind(ReviewRepository::class, function ($app) {
            return new ReviewRepository($app->make(Review::class));
        });

        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make(ReviewRepository::class), $app->make(ProductRepository::class));
        });
        $this->app->bind(ReviewService::class, function ($app) {
            return new ReviewService($app->make(ReviewRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
