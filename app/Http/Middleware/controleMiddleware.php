<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
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
        $userIP = $_SERVER['REMOTE_ADDR'];
        $location = Location::get('80.88.9.0');
        $latitude = $location->latitude;
        $longitude = $location->longitude;
       
        if(Auth::check()){
            $username=Auth::user()->username;
        
            Log::create([

                'mensagem'=>"O usuário $username acessou uma rota ",
                'erro'=>'N/A',
                'navegador'=>$request->userAgent(),
                'localizacao'=>"Latitude: $latitude | Longitude: $longitude",
                'rota'=>$request->path(),
                'ip'=>$request->ip(),
            ]);
        return $next($request);
    }
        
        else{

           
            Log::create([

                'mensagem'=>"Um vistiante acessou uma rota ",
                'erro'=>'N/A',
                'navegador'=>$request->userAgent(),
                'localizacao'=>"Latitude: $latitude | Longitude: $longitude",
                'rota'=>$request->path(),
                'ip'=>$request->ip(),
            ]);
        return $next($request);
    }

    }
}
