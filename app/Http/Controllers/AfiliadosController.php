<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\afiliado;
use App\Models\User;

class AfiliadosController extends Controller
{
    //
    public function index(){
        $users=User::where('pontos','>=','50')
        ->get();
        $users2=User::where('vc_tipo_utilizador', 6)
        ->join('pagamentos','pagamentos.id_user','users.id')
        ->select('users.*','pagamentos.valor as valorPago','pagamentos.comprovativo as comprovativoPagamento')
        ->orderBy('users.id','desc')
        ->get();
        $afiliado=afiliado::orderBy('id','desc')->first();
        return view('admin.afiliado.index',compact('users','afiliado','users2'));
    }
    public function preco(){
        $afiliados=afiliado::orderBy('id','desc')
        ->get();
        return view('admin.afiliado.preco',compact('afiliados'));
    }        
    public function store(Request $req){
        try{
        afiliado::create([
            'valor'=>$req->valor
        ]);
        return redirect()->back()->with('cadastrada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("cadastrada_f", 1);
    }
    }
    public function update($id, Request $req){
        try{
        afiliado::where('id',$id)->update([
            'valor'=>$req->valor
        ]);
        return redirect()->back()->with('editada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        afiliado::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }
    
}
