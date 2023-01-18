<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\Physician;
use App\Models\User;

class AppointmentsDetailController extends Controller
{
    public function index(User $physician)
    {
        $physicianDetails = Physician::where('user_id', $physician->id)->first();

        $appointments = $physicianDetails->appointments()->where(
            'user_id_patient',
            auth()->id()
        )
        ->get();

        $appointments->count() > 1 ? $firstConsultation = false : $firstConsultation = true;
        $firstConsultation === true ? $cost = $physicianDetails->first_time_consultation : $cost = $physicianDetails->subsequent_consultation;

        return response()->json([
            'data' => [
                'first_consultation' => $firstConsultation,
                'cost' => $cost,
            ],
        ]);
    }
}
