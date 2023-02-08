<?php

namespace App\Http\Middleware;

use App\Models\Patient;
use Closure;
use Illuminate\Http\Request;

class IsPatientOfUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $patientId = null;
        if ($request->route('patient')) {
            $patientId = $request->route('patient')->id;
        }
        if ($request->route('patient_id')) {
            $patientId = $request->route('patient_id');
        }

        if (empty($patientId)) {
            return conflict('Debes pasar un id de paciente', []);
        }
        $patient = Patient::where(
            [
                ['id', $patientId],
                ['user_id', auth()->id(),
                ],
            ])->first();
        if (empty($patient)) {
            return conflict('No puedes acceder a este paciente', []);
        }

        return $next($request);
    }
}
