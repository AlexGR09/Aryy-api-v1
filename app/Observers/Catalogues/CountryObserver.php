<?php

namespace App\Observers\Catalogues;

use App\Models\Country;

class CountryObserver
{
    public function deleted(Country $country)
    {
        $country->update([
            'name' => time().'::'.$country->name,
        ]);
    }
}
