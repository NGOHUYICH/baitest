<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class checklogin
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
        //return $request->trangthai;
       // return redirect('/Login');
      // dd($request);
        if(!isset($request->status)){
           return redirect('/Login');
        }else
        {
            return $next($request);
        }
    }
}
