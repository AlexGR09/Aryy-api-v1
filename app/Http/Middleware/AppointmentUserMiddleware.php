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
        $appointment = $request->route('appointment');
        $appointmentDB = Appointment::where([
            ['user_id', auth()->id()],
            ['id', $appointment->id],
        ])->first();
        if ($appointmentDB) {
            return $next($request);
        }

        return response()->json(['message' => 'No tienes permiso para modificar esta cita'], 403);
    }
}
