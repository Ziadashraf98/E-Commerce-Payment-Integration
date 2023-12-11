<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        if(Auth::guard('web')->check()) //or if(session()->get('guard') == 'web')
        {
            if(User::latest()->first()->created_at->format('i') == date('i', strtotime(now())))
            {
                return redirect()->route('redirect')->with('userRegister' , Alert::success("You have registered successfully" , 'welcome'));
            }

            return redirect()->route('redirect')->with('userLogin' , Alert::success("You have logged successfully" , 'welcome'));
        }
                
        return $next($request);
    }
}
