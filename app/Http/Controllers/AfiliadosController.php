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
       
        
        return view('admin.afiliado.index');
    }
    public function index2(){ 
     
        
        return view('auth.register-afiliado');
        

        
        }

        public function update($id, Request $req){
            try{
                User::where('id',$id)->update([
                'iban'=>$req->iban,
            ]);
            return redirect()->back()->with('editada', 1);
    
        } catch (\Throwable $th) {
            log::create([
                'mensagem'=>'Erro ao editar categoria',
                 
        
            ]);
            return redirect()->back()->with('editada_f', 1);
        }
        }

    /*
    public function store(Request $req){
        try{
        afiliado::create([
            'valor'=>$req->valor
        ]);
        return redirect()->back()->with('status',1);
    }catch (\Throwable $th) {
        return redirect()->back()->with("status_f", '1');
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
    */
}
