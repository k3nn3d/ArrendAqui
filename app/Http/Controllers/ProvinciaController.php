<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\provincia;
class ProvinciaController extends Controller
{
    //
    public function index(){
     
        $provincias=provincia::get();
        return view('admin.provincia.index', compact('provincias'));
    }


    public function store(Request $req){
        try{
            

        provincia::create([
            'name'=>$req->name
        ]);
        return redirect()->back()->with('cadastrada', 1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao cadastrar província',
             
    
        ]);
        return redirect()->back()->with('cadastrada_f', 1);
    }
    }
    public function update($id, Request $req){
        try{
        provincia::where('id',$id)->update([
            'name'=>$req->name
        ]);
        return redirect()->back()->with('editada', 1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao editar província',
             
    
        ]);
        return redirect()->back()->with('editada_f', 1);
    }
    }
    public function delete($id){
        try{
        provincia::destroy($id);
        return redirect()->back()->with('eliminada', 1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao deletar província',
             
    
        ]);
        return redirect()->back()->with('eliminada_f', 1);
    }
    }
    
}
