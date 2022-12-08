<?php

namespace App\Observers\Catalogues;

use App\Models\State;

class StateObserver
{
    public function deleted(State $state)
    {
        $state->update([
            'name' => time() . '::' . $state->name
        ]);
    }
}
