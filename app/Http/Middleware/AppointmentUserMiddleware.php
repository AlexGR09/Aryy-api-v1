<?php

namespace App\Http\Middleware;

use App\Models\Appointment;
use Closure;
use Illuminate\Http\Request;

class AppointmentUserMiddleware
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
        if (auth()->user()->hasRole('Physician')) {
            $currentUser = [
                'user_id_physician' => auth()->id(),
            ];
        }

        if (auth()->user()->hasRole('Patient')) {
            $currentUser = [
                'user_id_patient' => auth()->id(),
            ];
        }
        $appointment = $request->route('appointment');
        $appointmentDB = Appointment::where([
            $currentUser,
            ['id', $appointment->id],
        ])->first();
        if ($appointmentDB) {
            return $next($request);
        }

        return response()->json(['message' => 'No tienes permiso para modificar esta cita'], 403);
    }
}
