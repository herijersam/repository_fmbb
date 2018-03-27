<?php

namespace App\Http\Middleware;

use Closure;

class SessionIdevent
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
        if( $request->session()->has('idevent') )
            return $next($request);
        else
           redirect()->route('show.event')->with('remarque','La Session a été expirée ! <br> Veuillez réessayer ! ');
    }
}
