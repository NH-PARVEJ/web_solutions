<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
       if(auth()->user()->role == 1){
        return $next($request);
       }
       else if(auth()->user()->role == 2){
        return redirect()->to('/employee/dashboard');
       }
       else if(auth()->user()->role == 3){
        return redirect('/employee/dashboard');
       }
       else{
        return redirect('/')->with('Sorry!!! You Have No Access in the Backend');
       }

    }
}
