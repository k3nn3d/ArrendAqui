<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class pedidoController extends Controller
{
    //
    public function pedido(){
      $pedidos=Pedido::join('casas','casas.id','pedidos.id_casa')
      ->join('provincias','provincias.id','casas.id_provincia')
      ->join('municipios','municipios.id','casas.id_municipio')
      ->select('pedidos.*','casas.vc_path as foto','provincias.name as provincia','municipios.name as municipio','casas.bairro as bairro')
      ->get();
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

        return redirect()->route('user.pedido')->with('pedido',1);
    }



    public function pedido_ver(Pedido $pedido){
        $pedido->join('casas','casas.id','pedidos.id_casa')
        ->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->select('pedidos.*','casas.vc_path as foto','casas.latitude as casa_latitude','casas.longitude as casa_longitude')
        ->first();
        $users=User::get();
        return view('site.perfil.pedido_ver',compact('pedido','users'));  
      }

      public function pedido_cancelar(Pedido $pedido){
        $pedido->update([
            'estado'=>'Pendente',
        ]);
        return redirect()->back(); 
     }
      public function recusar(Pedido $pedido){
        $pedido->update([
            'estado'=>'Recusado',
        ]);
        return redirect()->back();  
      }
      public function pedido_aceitar(Pedido $pedido){
        $pedido->update([
            'estado'=>'Reservado',
            'id_motorista'=>Auth::user()->id,
        ]);
        
        return redirect()->route('user.pedido.ver',$pedido->id)->with('pedido_aceitar',1);  
      }
}
