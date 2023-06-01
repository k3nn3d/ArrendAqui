<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\motorista;

class MotoristaController extends Controller
{
    //

    public function index(){ 
        $users=User::where('users.vc_tipo_utilizador',3)
        ->where('aluguels.estado','reservado')
        ->join('carros','carros.id_user','users.id')
        ->join('aluguels','aluguels.id_carro','carros.id')
        ->select('users.*',DB::raw('SUM(carros.preco) as carroPreco'))
        ->groupBy('users.id')
        ->get();

        $users2=User::where('users.vc_tipo_utilizador',3)
        ->where('aluguels.estado','reservado')
        ->join('carros','carros.id_user','users.id')
        ->join('aluguels','aluguels.id_carro','carros.id')
        ->join('pagamentos','pagamentos.id_user','users.id')
        ->select('users.*','pagamentos.valor as valorPago','pagamentos.estado as estadoPago','pagamentos.comprovativo as comprovativoPagamento',DB::raw('SUM(carros.preco) as carroPreco'))
        ->groupBy('users.id')
        ->orderBy('users.id','desc')
        ->get();
        $motorista=motorista::orderBy('id','desc')->first();
        return view('admin.motorista.index',compact('users','motorista','users2'));
        

        
        }
    public function preco(){
        $motoristas=motorista::orderBy('id','desc')
        ->get();
        return view('admin.motorista.preco',compact('motoristas')); 
    }
      
    public function store(Request $req){
        try{
        motorista::create([
            'valor'=>$req->valor
        ]);
        return redirect()->back()->with('cadastrada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("cadastrada_f", 1);
    }
    }
    public function update($id, Request $req){
        try{
        motorista::where('id',$id)->update([
            'valor'=>$req->valor
        ]);
        return redirect()->back()->with('editada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        motorista::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("eliminada_f", '1');
    }
    }








    public function motorista(){ 
        $dados['titulo']="Minhas Dividas";
        $perct=motorista::orderBy('id','DESC')->first('valor');
       $id=Auth::user()->id;

        $dados['motoristas']=pagamento_motorista::join('users','pagamento_motoristas.id_user','users.id')
        ->select('users.id','users.name as motorista','pagamento_motoristas.preco as preco',DB::raw('sum(preco) as total'))
        ->where('users.id',$id)
        ->groupBy('users.id')
        ->get();

        if($perct){
            $dados['preco']=($perct->valor/100);
        }
        else{
            $dados['preco']=0;
        }

        return view('admin.p_motorista.index',$dados);
        

        

    }

    public function pagar($valor,Request $req){
    
        try{
            $id=Auth::user()->id;
            if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
                $req_imagem=$req->vc_path;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/pagamento/motorista"), $imagem_name);
                $dir = "imagens/pagamento/motorista";
                $caminho=$dir. "/". $imagem_name;
                p_motorista::create([
                    'id_motorista'=>$id,
                    'vc_path'=>$caminho,
                    'estado'=>0,
                    'valor'=>$req->valor,
                    'iban'=>$req->iban,
                ]);
            return redirect()->back()->with('status',1);
            }
        }catch (\Throwable $th) {
            return redirect()->back()->with("status_f", '1');
        }
    }
    public function pagamentos(){
        $dados['titulo']="Lista de Pagamentos dos Motoristas";
        $perct=motorista::orderBy('id','DESC')->first('valor');
        if($perct){
                   $dados['preco']=($perct->valor/100);
               }
               else{
                   $dados['preco']=0;
               }
          
        if(Auth::user()->vc_tipo_utilizador==1){
        $dados['pagamentos']=p_motorista::join('users','p_motoristas.id_motorista','users.id')
        ->select('users.name as motorista','p_motoristas.*')
        ->paginate(6);
        return view('admin.p_motorista.index2',$dados);
        }
   
        elseif(Auth::user()->vc_tipo_utilizador==2){
            $id=Auth::user()->id;
            $dados['pagamentos']=p_motorista::join('users','p_motoristas.id_motorista','users.id')
            ->where('p_motoristas.id_motorista',$id)
            ->select('users.name as motorista','p_motoristas.*')
            ->paginate(6);
            return view('admin.p_motorista.index2',$dados);
        
        }
       else{
        return redirect()->back();
       }
        
    }
    public function expulsar($id){
        
        try{
        User::where('id',$id)->update([
            'estado'=>4
        ]);
        return redirect()->back()->with('expulso',1);
    }catch (\Throwable $th) {
   
        return redirect()->back()->with("status_f", '1');
    }
}
    public function ativar($id){
        
        try{
        User::where('id',$id)->update([
            'estado'=>2
        ]);
        return redirect()->back()->with('aceito',1);
    }catch (\Throwable $th) {
   
        return redirect()->back()->with("status_f", '1');
    }
}
    public function aprovado($id){
        
        try{
            p_motorista::where('id',$id)->update([
            'estado'=>1
        ]);
        return redirect()->back()->with('expulso',1);
    }catch (\Throwable $th) {
   
        return redirect()->back()->with("status_f", '1');
    }
}
    public function reprovado($id){
        
        try{
            p_motorista::where('id',$id)->update([
            'estado'=>2
        ]);
        return redirect()->back()->with('expulso',1);
    }catch (\Throwable $th) {
   
        return redirect()->back()->with("status_f", '1');
    }
    }
}
