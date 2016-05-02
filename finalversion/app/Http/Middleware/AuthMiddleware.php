<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
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
        if(Auth::guest()) {
            \Session::flash('message','You are not allowed to be here. First Sign In!');
            redirect('/auth');
        }
    }
}
