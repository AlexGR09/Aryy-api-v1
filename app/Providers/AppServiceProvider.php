<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\State;
use App\Observers\Catalogues\CountryObserver;
use App\Observers\Catalogues\StateObserver;
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
        State::observe(StateObserver::class);
        \Carbon\Carbon::setLocale(config('app.locale'));
    }
}
