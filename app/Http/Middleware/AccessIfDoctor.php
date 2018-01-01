<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Doctor ;

class AccessIfDoctor
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
        //return $next($request);
        $model = Auth::guard('api')->user();

        if ($model instanceof Doctor) {
            return $next($request);
        } else {
            return response()->json("You aren't doctor" , 403);
        }

    }
}
