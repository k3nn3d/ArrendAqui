<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class pedidoController extends Controller
{
    //
    public function pedido(){
      $pedidos=Pedido::get();
      return view('site.perfil.pedido',compact('pedidos'));  
    }


    public function store(Request $req){

        Pedido::create([
            'id_user'=>Auth::user()->id,
            'id_casa'=>$req->casa,
            'estado'=>'Pendente',
            'preco'=>$req->preco,
            'data'=>$req->data,
            'hora'=>$req->hora,
            'latitude'=>$req->latitude,
            'longitude'=>$req->longitude,
        ]);

        return redirect()->route('user.pedido');
    }
}
