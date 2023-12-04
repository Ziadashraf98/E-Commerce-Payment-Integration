<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckAdmin
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
        if(Auth::user()->is_admin == false)
        {
            if(Auth::user()->created_at->format('s') == date('s', strtotime(now())))
            {
                return redirect()->route('redirect')->with('userRegister' , Alert::success("You have registered successfully" , 'welcome'));
            }

            return redirect()->route('redirect')->with('userLogin' , Alert::success("You have logged successfully" , 'welcome'));
        }
                
        return $next($request);
    }
}
