<?php

namespace App\Http\Middleware;

use Closure;
use App\Equipe;

class Verifyequipe
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
        if(!empty($request->post('equipe1')) || !empty($request->post('equipe2')) )
        {
            $equipe1 = Equipe::where('sigle',$request->post('equipe1'))->first()->IDEQUIPE;
            $request->attributes->add(['equipe_id1' => $equipe1 ]);
            $equipe2 = Equipe::where('sigle',$request->post('equipe2'))->first()->IDEQUIPE;
             $request->attributes->add(['equipe_id2' => $equipe2 ]);
            return $next($request);
        }
        elseif($request->route('id'))
        {
            $equipe_id = Equipe::where('sigle',$request->route('id'))->first()->IDEQUIPE;
            $request->attributes->add(['equipe_id' => $equipe_id ]);
            return $next($request);
        }
        else
        {
            return redirect()->route('error.errorpage');
        }
        
    }
}
