<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\log;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)

    {
       
        $request->authenticate();

        $request->session()->regenerate();
        log::create([
            'mensagem'=> "O usuário $request->username fez login"

        ]);
        $user=User::where('username',$request->username)->update([
            'ativo'=>1,
        ]);
        $user=User::where('username',$request->username)->first();
        if($user->vc_tipo_utilizador== 1 || $user->vc_tipo_utilizador== 2){
            return redirect()->route('admin.painel');
       

        }else{
            return redirect()->route('user.dashboard');
        }


        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
       

        log::create([
            'mensagem'=> "O usuário $request->username fez logout"

        ]);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        $user=User::where('username',$request->username)->update([
            'ativo'=>0,
        ]);

        return redirect('/login');
    }
}
