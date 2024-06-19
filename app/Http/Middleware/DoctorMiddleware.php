<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoctorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->isDoctor()) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
