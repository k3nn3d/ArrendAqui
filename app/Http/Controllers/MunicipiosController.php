<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\municipio;
use App\Models\log;
class MunicipiosController extends Controller
{
    public function index(){
        

        return view('admin.municipio.index');
    }

    public function store(Request $req){
        try{
        municipio::create([
            'name'=>$req->name
        ]);
        return redirect()->back()->with('cadastrada',1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao cadastrar município',
             
    
        ]);
        return redirect()->back()->with("cadastrada_f", '1');
    }
    }
    public function update($id, Request $req){
        try{
        municipio::where('id',$id)->update([
            'name'=>$req->name
        ]);
        return redirect()->back()->with('editada',1);
    }catch (\Throwable $th){
     log::create([
        'mensagem'=>'Erro ao editar município',
         

    ]);
        return redirect()->back()->with("editada_f", '1');
    }
    }
    public function delete($id){
        try{
        municipio::destroy($id);
        return redirect()->back()->with('eliminada',1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao deletar município',
             
    
        ]);
        return redirect()->back()->with("eliminada_f", '1');
    }
    }

}
