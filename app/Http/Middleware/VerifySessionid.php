<?php

namespace App\Http\Middleware;

use Closure;

class VerifySessionid
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
        if( $request->session()->get('_previous.url') == route('show.event') ){
            $request->attributes->add(['reference' => true ]);
            $request->session()->put('matchIndependant',true);
            return $next($request);
        }
        elseif($request->session()->has('idevent')){
            return $next($request);
        }
        else{
            return redirect()->route('error.errorpage');
        }
    }
}
