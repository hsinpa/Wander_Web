<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class CheckSession
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)  {
        //If session is over, then redirect to logout
        if (! $request->session()->has('cms.token') ) {
          return redirect('cms/logout');
        }
        return $next($request);
    }
}
