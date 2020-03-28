<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, config('app.locale'));

        $this->app->bind('GlobalAuth', 'App\Support\GlobalAuth');
        $this->app->bind('SwitchLocale', 'App\Support\SwitchLocale');
    }
}
