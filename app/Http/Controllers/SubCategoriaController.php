<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sub_categoria;
use App\Models\Categoria;
class SubCategoriaController extends Controller
{
    public function index(){
        $categorias=Categoria::get();
        $sub_categoria=sub_categoria::join('categorias','sub_categorias.id_categoria','categorias.id' )
        ->select('sub_categorias.*','categorias.name as cat_name')->get();
      
        
        return view('admin.sub_categoria.index', compact('categorias', 'sub_categoria'));
    }

    

    public function store(Request $req){
        try{
        sub_categoria::create([
            'name'=>$req->name,
            'id_categoria'=>$req->id_categoria
            
        ]);
        return redirect()->back();
    }catch (\Throwable $th) {
        return dd($th);
    }
    }
    public function update($id, Request $req){
        try{
         
        sub_categoria::where('id',$id)->update([
            'name'=>$req->name,
           
        ]);
        return redirect()->back();

    } catch (\Throwable $th) {
        return redirect()->back();
    }
    }
    public function delete($id){
        try{
        sub_categoria::destroy($id);
        return redirect()->back();
    }catch (\Throwable $th) {
        return redirect()->back();
    }
    }

}
