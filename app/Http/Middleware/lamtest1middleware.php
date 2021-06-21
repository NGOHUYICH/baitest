<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class lamtest1middleware
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
        if($request->loidi=="ngohuyich"){
            echo 'Di dung duong';
            return $next($request);
        }else
        {
            echo 'sai duong';
        }
    }
}
