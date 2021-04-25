<?php

namespace App\Providers;

use App\Services\HandlerInterface;
use App\Services\PostAPIService;
use Illuminate\Support\ServiceProvider;
use App\DTO\PostAPI;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HandlerInterface::class, PostAPIService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
