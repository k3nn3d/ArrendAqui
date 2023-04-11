<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /* ==Níveis de Acesso==
         * 1-Administrador
         * 2-Gerente
         * 3-Motorista
         * 4-Afiliado
         * 5-Senhorio
         * 6-Cliente
         */
    public function index(Request $req){
        $users=User::get();
      
      
        
       
        
        if($req->vc_tipo_utilizador){
            $users=User::where('vc_tipo_utilizador', $req->vc_tipo_utilizador)->get();
           
            
        }

        if($req->name){
            $users=User::where('name','like', "%$req->name%")->get();
          
        }

        if($req->vc_tipo_utilizador && $req->name){
            $users=User::where('vc_tipo_utilizador', $req->vc_tipo_utilizador)->where('name','like', "%$req->name%")->get();

        }
        $tipo = $req->vc_tipo_utilizador;
        $name = $req->name;

       
      
        return view('admin.user.index', compact('users','tipo','name'));

        
        


    }
       
    public function edit($id){
        return view('site.perfil.edit');

    }

    public function index2(){
        return view('site.perfil.dados');

    }

   
    public function store(Request $req){
       
        try{

            if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
                // Imagem VC_PATH
                $req_imagem=$req->vc_path;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
                $dir = "imagens/galeria";
                $caminho=$dir. "/". $imagem_name;
                $user=User::create([
                    'name'=>$req->name,
                    'lastname'=>$req->lastname,
                    'username'=>$req->username,
                    'email'=>$req->email,
                    'password'=>Hash::make($req->password),
                    'vc_path'=>$caminho,
                    'vc_tipo_utilizador'=>$req->vc_tipo_utilizador
                ]);
                if($req->hasFile('habilitacoes') && $req->file('habilitacoes')->isValid()){
                    // Imagem Hablitacôes
                $req_habilitacoes=$req->habilitacoes;
                $extension=$req_habilitacoes->extension();
                $habilitacoes_name=md5($req_habilitacoes->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_habilitacoes->move(public_path("imagens/habilitacoes"), $habilitacoes_name);
                $dir = "imagens/habilitacoes";
                $caminho_habilitacoes=$dir. "/". $habilitacoes_name;
                $id=$user->id;
                User::where('id',$id)->update([
                        'habilitacoes'=>$caminho_habilitacoes
                 ]);
                }
                if($req->hasFile('bi') && $req->file('bi')->isValid()){
                    // Imagem Hablitacôes
                $req_bi=$req->bi;
                $extension=$req_bi->extension();
                $bi_name=md5($req_bi->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_bi->move(public_path("imagens/bi"), $bi_name);
                $dir = "imagens/bi";
                $caminho_bi=$dir. "/". $bi_name;
                $id=$user->id;
                User::where('id',$id)->update([
                        'bi'=>$caminho_bi
                 ]);
                }
              return redirect()->back()->with('cadastrada', 1);
    }
    else{

        $user=User::create([
            'name'=>$req->name,
            'lastname'=>$req->lastname,
            'username'=>$req->username,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
            'vc_path' =>"imagens/user.png",
            'vc_tipo_utilizador'=>$req->vc_tipo_utilizador
        ]);

      
        return redirect()->back()->with('cadastrada', 1);
    }
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao cadastrar usuário',
             
    
        ]);
        return redirect()->back()->with('cadastrada_f', 1);
    }
    }
    
    public function update( Request $req, $id){
        try{
           
            
            if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
                // Imagem VC_PATH
                $req_imagem=$req->vc_path;
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
                $dir = "imagens/galeria";
                $caminho=$dir. "/". $imagem_name;
                $user=User::where('id',$id)->update([
                    'name'=>$req->name,
                    'email'=>$req->email,
                    'password'=>Hash::make($req->password),
                    'vc_path'=>$caminho,
                    'vc_tipo_utilizador'=>$req->vc_tipo_utilizador
                   
                ]);
                if($req->hasFile('bi') && $req->file('bi')->isValid()){
                    // Imagem Hablitacôes
                $req_bi=$req->bi;
                $extension=$req_bi->extension();
                $bi_name=md5($req_bi->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_bi->move(public_path("imagens/bi"), $bi_name);
                $dir = "imagens/bi";
                $caminho_bi=$dir. "/". $bi_name;
               
                User::where('id',$id)->update([
                        'bi'=>$caminho_bi
                 ]);
                }
                if($req->hasFile('habilitacoes') && $req->file('habilitacoes')->isValid()){
                    // Imagem Hablitacôes
                $req_habilitacoes=$req->habilitacoes;
                $extension=$req_habilitacoes->extension();
                $habilitacoes_name=md5($req_habilitacoes->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_habilitacoes->move(public_path("imagens/habilitacoes"), $habilitacoes_name);
                $dir = "imagens/habilitacoes";
                $caminho_habilitacoes=$dir. "/". $habilitacoes_name;

                User::where('id',$id)->update([
                        'habilitacoes'=>$caminho_habilitacoes
                 ]);
                }
        return redirect()->back()->with('editada',1);
            }
            else{
                if($req->hasFile('bi') && $req->file('bi')->isValid()){
                    // Imagem Hablitacôes
                $req_bi=$req->bi;
                $extension=$req_bi->extension();
                $bi_name=md5($req_bi->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_bi->move(public_path("imagens/bi"), $bi_name);
                $dir = "imagens/bi";
                $caminho_bi=$dir. "/". $bi_name;

                User::where('id',$id)->update([
                        'bi'=>$caminho_bi
                 ]);
                }
                if($req->hasFile('habilitacoes') && $req->file('habilitacoes')->isValid()){
                    // Imagem Hablitacôes
                $req_habilitacoes=$req->habilitacoes;
                $extension=$req_habilitacoes->extension();
                $habilitacoes_name=md5($req_habilitacoes->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_habilitacoes->move(public_path("imagens/habilitacoes"), $habilitacoes_name);
                $dir = "imagens/habilitacoes";
                $caminho_habilitacoes=$dir. "/". $habilitacoes_name;

                User::where('id',$id)->update([
                        'habilitacoes'=>$caminho_habilitacoes
                 ]);
                }
                else{
                    User::where('id',$id)->update([
                        'name'=>$req->name,
                        'email'=>$req->email,
                        'password'=>Hash::make($req->password),
                        'vc_tipo_utilizador'=>$req->vc_tipo_utilizador

                    ]);
                    return redirect()->back()->with('editada', 1);
                }

            }
    } catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao editar usuário',
             
    
        ]);
        return redirect()->back()->with('editada_f', 1);
    }
    }


    public function delete($id){
        try{

        
        
        User::where('id', $id)->delete();
        return redirect()->back()->with('eliminada', 1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao deletar usuário',
             
    
        ]);
        return redirect()->back()->with('eliminada_f', 1);
    }
    }


    public function index3( User $id){
        return view('auth.register-convite', compact('id'));
    }




    
    public function list_afiliado(){
        $users=User::where('vc_tipo_utilizador', 3)->where('pontos' ,'!=', 0)->get();

        // dd($users);
        $afiliado=afiliado::orderBy('id','DESC')->first('valor');

        return view('admin.user.afiliado', compact('users', 'afiliado'));

    }

    public function create2(){
    
          
        $id=Auth::user()->id;
        $valor=carros::where('carros.id_user',$id )->join('reservas','carros.id','reservas.id_carro')
        ->where('reservas.estado',1)
        ->select(db::raw('sum(carros.preco) as total'))
        ->groupBy('carros.id_user')
        ->first();

        
    
       // dd($valor->total);
        $percent=motorista::orderBy('id','DESC')->first('valor')->valor;
        $dados['preco']=($percent/100) * $valor->total;
       // dd($dados['preco']);
    
        
        
       
        return view('site.motorista_banido_pagamento',$dados);
    
    }

    public function store2(Request $req, $preco){
        $id=Auth::user()->id;
        if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
            // Imagem VC_PATH
            $req_imagem=$req->vc_path;
            $extension=$req_imagem->extension();
            $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
            $dir = "imagens/galeria";
            $caminho=$dir. "/". $imagem_name;
       
            
        
            Pamenento::create([
                'id_user'=>$id,
                'vc_path'=>$caminho,
                'valor'=>$preco
            ]);
    }
    


    }
    public function motoristaCreate(){
        return view('auth.register-motorista');
    }
}
