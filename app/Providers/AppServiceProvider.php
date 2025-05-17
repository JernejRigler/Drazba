<?php

namespace App\Providers;

use Carbon\Carbon;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // nastavimo slovenski locale, da se najucinkovitejse prikaze "Ustvarjeno x sekund nazaj"
        Carbon::setLocale('sl');
        setlocale(LC_TIME, 'sl_SI.UTF-8');
    }
}
