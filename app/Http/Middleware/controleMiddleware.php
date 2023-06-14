<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class controleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
        
            Log::craeate([

                'mensagem',
                'erro',
                'navegador',
                'localizacao',
                'rota',
                'ip',
            ]);
        return $next($request);
    }
        
        else{

            Log::craeate([

                'mensagem',
                'erro',
                'navegador',
                'localizacao',
                'rota',
                'ip',
            ]);
        return $next($request);
    }

    }
}
