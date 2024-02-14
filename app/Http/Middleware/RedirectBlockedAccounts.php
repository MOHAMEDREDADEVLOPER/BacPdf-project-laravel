<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectBlockedAccounts
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


            if(Auth::user()->status == 3)
            {

                Auth::logout();
                
                return view('pages.ereur');

            }

        
        return $next($request);

    }
}
