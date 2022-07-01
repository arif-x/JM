<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect(route('adminLogin'));
            }
        }
        
        $response = $next($request);
        return $response;

    }
}
