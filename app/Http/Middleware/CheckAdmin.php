<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        $admin  = Auth::user();
        if($admin == null){
            return redirect()->route('login');
        }
        if($admin->waiting()){
            return  back()->with('message','You haven\'t been confirmed yet');
        }
        if($admin->block()){
            return  back()->with('block','You are Blocked');
        }
        if (!$admin->isAdmin()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
