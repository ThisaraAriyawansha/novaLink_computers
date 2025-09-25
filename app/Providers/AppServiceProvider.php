<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\ProductComposer;
use App\Models\Product;

use App\Services\DeepSeekService;



class AppServiceProvider extends ServiceProvider
{


        public function register()
    {
        $this->app->singleton(DeepSeekService::class, function ($app) {
            return new DeepSeekService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

    }

}
