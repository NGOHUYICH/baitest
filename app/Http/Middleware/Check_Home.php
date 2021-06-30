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
        // return redirect('http://baitest.test/AdidasNgoIch');
        //echo Auth::guest();
        // dd(($request));
        $user = Auth::id();
        
        dd($user);
        // if(empty($user->id)){
        //     echo 'thao bao';
        //     return redirect()->intended('AdidasNgoIch/');
        // }else{
        //     echo 'loi dc';
        //     // 
        // }

       // return $next($request);
        
    }
}
