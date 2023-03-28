<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\log;

class contatoController extends Controller
{
    //
    public function index(){

        return view('site.contate.contact');
    }
    public function index2(){
        $contatos=Contato::get();

        return view('admin.suporte.index', compact('contatos'));
    }

    public function store(Request $req)
    {
        //
       
            try{
                
    
            Contato::create([
                'name'=>$req->name,
                'mensagem'=>$req->mensagem,
                'assunto'=>$req->assunto,
                'email'=>$req->email
            ]);
            return redirect()->back()->with('cadastrada', 1);
        }catch (\Throwable $th) {
            log::create([
                'mensagem'=>'Erro ao enviar mensagem',
                 
        
            ]);
            return redirect()->back()->with('cadastrada_f', 1);
        }
    }

   
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        try{
                
    
            Contato::where('id',$id)->update([
                'name'=>$req->name,
                'mensagem'=>$req->mensagem,
                'assunto'=>$req->assunto,
                'email'=>$req->email
            ]);
            return redirect()->back()->with('cadastrada', 1);
        }catch (\Throwable $th) {
           
            log::create([
                'mensagem'=>'Erro ao cadastrar província',
                 
        
            ]);
            return redirect()->back()->with('cadastrada_f', 1);
        }
    }


}
