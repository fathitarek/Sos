<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckRoute {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user=null;

        if(Auth::check()){
            $user = Auth::user();
        }
        else return redirect()->back()->withErrors(['Please Login First ']);  
        if (canAccess($user,\Request::route()->getName())) {
            return $next($request);
        } else {
             return redirect()->back()->withErrors(['You Are Allowed to Access This Pages']);
        }
    }

}
