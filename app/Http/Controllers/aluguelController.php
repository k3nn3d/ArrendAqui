<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aluguel;
use App\Models\User;
use App\Models\Carro;
use Illuminate\Support\Facades\Auth;

class aluguelController extends Controller
{
    //
    public function index(){
        $arrendamentos=aluguel::join('casas','casas.id','aluguels.id_casa')
        ->join('users','users.id','aluguels.id_user')
        ->select('aluguels.*','casas.vc_path as casa','users.name as cliente_p','users.lastname as cliente_u')
        ->get();
        $users=User::get();
        return view('admin.aluguel.index',compact('arrendamentos','users'));
    }
    public function index2(){
        return view('site.perfil.alugueis');
    }
    public function create($id){
        return view('site.aluguel.index', compact('id'));
    }



    public function store($id){
        $user_id = Auth::user()->id;

        $arrendamento = aluguel::create([
           'id_user'=>$user_id,
           'id_casa'=>$id 
        ]);
        return redirect()->route('user.aluguel')->with('reservado',1);
    }
    public function update($id){
        aluguel::where('id',$id)->update([
           'estado'=>'Reservado'
        ]);
        return redirect()->back()->with('reservado',1);
    }
    public function delete($id){
       
        aluguel::where('id',$id)->delete();
        return redirect()->back()->with('reservado_eliminada',1);
    }
    public function reservar_carro($id, $id_casa){

        $carros=Carro::get();
        return view('site.carro.reservar',compact('carros'));

    }
    public function n_reservar_carro($id){
        
        return redirect()->back();
        
    }

    public function recusar($id){
        aluguel::where('id',$id)->update([
            'estado'=>'Recusado'
         ]);
         return redirect()->back()->with('recusado',1);   

    }
}
