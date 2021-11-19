<?php

namespace App\Providers;

use App\Http\Controllers\ClientRequestController;
use App\Http\Interfaces\ExchangeClientInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExchangeClientInterface::class, ClientRequestController::class);
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
