<?php

namespace App\Http\Middleware;

use Closure;
use App\Event;

class Verifyid
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
        $id = $request->route('id');    
        //verification de l'idevent 
        if( Event::findOrFail($id)->first() )
        {
            return $next($request);
        }
        else
            return abort('500');
        
    }
}
