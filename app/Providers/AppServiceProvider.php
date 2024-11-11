<?php

namespace App\Providers;

use App\Repository\Track\TrackEloquent;
use App\Repository\Track\TrackRepositoryInterface;
use App\Repository\Page\PageEloquent;
use App\Repository\Page\PageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TrackRepositoryInterface::class, TrackEloquent::class);
        $this->app->bind(PageRepositoryInterface::class, PageEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
