<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class MotoristaController extends Controller
{
    //

    public function index(){ 
     
        
        return view('admin.motorista.index');
        

        
        }
        public function index2(){ 
     
        
            return view('auth.register-motorista');
            
    
            
            }

            public function update($id, Request $req){


            $req_bi=$req->bi;
            $extension=$req_bi->extension();
            $bi_name=md5($req_bi->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_bi->move(public_path("imagens/bi"), $bi_name);
            $dir = "imagens/bi";
            $caminho_bi=$dir. "/". $bi_name;    
 
            $req_habilitacoes=$req->habilitacoes;
            $extension=$req_habilitacoes->extension();
            $habilitacoes_name=md5($req_habilitacoes->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_habilitacoes->move(public_path("imagens/habilitacoes"), $habilitacoes_name);
            $dir = "imagens/habilitacoes";
            $caminho_habilitacoes=$dir. "/". $habilitacoes_name;

                try{
                User::where('id',$id)->update([
                    'habilitacoes'=>$req->habilitacoes,
                    'bi'=>$caminho_bi,
                    'telefone'=>$caminho_habilitacoes
                ]);
                return redirect()->back()->with('editada', 1);
        
            } catch (\Throwable $th) {
                $user=User::where('id', $id)->get('username');
                log::create([
                    'mensagem'=>"Erro ao actualizar dados de $user para tornar-se motorista",
                     
            
                ]);
                return redirect()->back()->with('editada_f', 1);
            }
            }

    


    public function motorista(){ 
        $dados['titulo']="Minhas Dividas";
        $perct=motorista::orderBy('id','DESC')->first('valor');
        $dados['empresa']=empresa::orderBy('id','desc')->first();
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
