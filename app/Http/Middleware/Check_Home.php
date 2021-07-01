<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Check_Home
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       // $a = Auth::guest();
        
        if(isset($_SERVER['HTTP_REFERER'])){
            return $next($request);
        }else{
            return redirect()->intended('/AdidasNgoIch');
        }
    }
}
