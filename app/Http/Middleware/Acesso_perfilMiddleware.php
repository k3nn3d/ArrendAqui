<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Acesso_perfilMiddleware
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
            if(Auth::user()->estado!=4){
            if( Auth::user()->vc_tipo_utilizador==0 or Auth::user()->vc_tipo_utilizador==2  or Auth::user()->vc_tipo_utilizador==3){
            
                        return $next($request);

                         }
                        }
                        else{
                            return redirect()->route('banido_pagamento.create');
                        }
                    }

                return redirect()->route('site.index')->with('acesso',1);
    }
}
