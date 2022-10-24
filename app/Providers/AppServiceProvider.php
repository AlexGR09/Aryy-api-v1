<?php

namespace App\Providers;

use App\Models\Country;
use App\Observers\Catalogues\CountryObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Country::observe(CountryObserver::class);
    }

}