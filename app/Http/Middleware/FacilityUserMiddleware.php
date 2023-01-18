<?php

namespace App\Http\Middleware;

use App\Models\Facility;
use Closure;
use Illuminate\Http\Request;

class FacilityUserMiddleware
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
        $facilities = Facility::whereRelation(
            'users',
            'user_id',
            auth()->id()
        )
        ->get();
        $facilitySearch = $request->route('facility');
        if (! $facilitySearch) {
            return $next($request);
        }
        foreach ($facilities as $facility) {
            if ($facility->id === $facilitySearch->id) {
                return $next($request);
            }
        }

        return response()->json([
            'message' => 'Este consultorio no te pertenece',
        ]);
    }
}
