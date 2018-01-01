<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Patient ;

class AccessIfPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $model = Auth::guard('api')->user();

        if ($model instanceof Patient) {
            return $next($request);
        } else {
            return response()->json("You aren't Patient" , 403);
        }

    }
}
