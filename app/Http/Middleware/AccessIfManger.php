<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\insuranceCompany;
use Illuminate\Support\Facades\Auth;

class AccessIfManger
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
        $user = null ;

        // Get ID of Requested Company
        $id = $request->route()->parameters['insuranceCompany'] ;
        $insuranceCompany = insuranceCompany::find($id);

        // Check If User is authenticated and return error if not
        if(Auth::check()){
            $user = Auth::user();
        }
        else 
            return redirect()->route('login')->withErrors(['Please Login First ']);  


        // Check If User is Super Admin
        if($user->role->role == "Super User")
            return $next($request);
            
        // Check if User is owner of Insurance Company redirect him if not
        if ($insuranceCompany->ownedBy($user)) {
            return $next($request);
        } else {
            return redirect()->back()->withErrors(['You Are Allowed to Access This Pages']);
        }
    }
}
