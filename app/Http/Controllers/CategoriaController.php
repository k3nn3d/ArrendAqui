<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use App\Models\log;

class CategoriaController extends Controller
{
    //
    public function index(){
        $categoria=Categoria::get();
       
        return view('admin.categoria.index', compact('categoria'));
    }

    
    public function store(Request $req){
        try{
        Categoria::create([
            'name'=>$req->name
        ]);
        return redirect()->back()->with('cadastrada', 1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao cadastrar categoria',
             
    
        ]);
        return redirect()->back()->with('cadastrada_f', 1);
    }
    }
    public function update($id, Request $req){
        try{
        Categoria::where('id',$id)->update([
            'name'=>$req->name
        ]);
        return redirect()->back()->with('editada', 1);

    } catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao editar categoria',
             
    
        ]);
        return redirect()->back()->with('editada_f', 1);
    }
    }
    public function delete($id){
        try{
        Categoria::destroy($id);
        return redirect()->back()->with('eliminada', 1);
    }catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao deletar categoria',
             
    
        ]);
        return redirect()->back()->with('eliminada_f', 1);
    }
    }
    
}
