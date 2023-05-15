<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use Illuminate\Support\Facades\Auth;
use App\Models\Casa;
use App\Models\Categoria;
use App\Models\sub_categoria;
use App\Models\provincia;
use App\Models\municipio;
use App\Models\Unidade;
use App\Models\log;

class carroController extends Controller
{
    //
    public function index(){
        $carros=Carro::get();

        return view('site.carro.index', compact('carros'));
    }
    public function index2(){
        return view('admin.carro.index');
    }
    public function show($id){
        $carro=Carro::find($id);
        return view('site.carro.productDetails', compact('carro'));
    
    }

      
public function edit($id){
    return view('site.perfil.edit');

}
public function create(){
    $unidades=Unidade::get();
    $categorias=Categoria::get();
    $sub_categorias=sub_categoria::get();
    $provincias=provincia::get();
    $municipios=municipio::get();
    return view('site.carro.create', compact('unidades','categorias','sub_categorias','provincias','municipios'));

}


public function store(Request $req){
    try{
    
         $id_user=Auth::user()->id; 
        
        if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
            dd($id_user);
            // Imagem VC_PATH
            $req_imagem=$req->vc_path;
            $extension=$req_imagem->extension();
            $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
            $dir = "imagens/galeria";
            $caminho=$dir. "/". $imagem_name;
            $carro=Carro::create([
             
                'modelo'=>$req->modelo,
                'vc_path'=>$req->vc_path,
                'marca'=>$req->marca,
                'estrelas'=>$req->estrelas,
                'combustivel'=>$req->combustivel,
                'preco'=>$req->preco,
                'lugares'=>$req->lugares,
                'espaco'=>$req->espaco,
                'id_user'=>$id_user,
                'id_categoria'=>$req->id_categoria
             
            ]);

            
            if($req->id_user){
                Carro::where('id',$carro->id)->update([
                    'id_user'=>$req->id_user
                ]);
            }
        

           
          
          return redirect()->route('carros')->with('cadastrada', 1);
}else{
    $req_imagem=$req->vc_path;
    $extension=$req_imagem->extension();
    $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
    $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
    $dir = "imagens/galeria";
    $caminho=$dir. "/". $imagem_name;
    $carro=Carro::create([
        'modelo'=>$req->modelo,
        'vc_path'=>$req->vc_path,
        'marca'=>$req->marca,
        'estrelas'=>$req->estrelas,
        'combustivel'=>$req->combustivel,
        'preco'=>$req->preco,
        'lugares'=>$req->lugares,
        'espaco'=>$req->espaco,
        'id_user'=>$id_user,
        'id_categoria'=>$req->id_categoria
     
    ]);
    return redirect()->route('carros')->with('cadastrada', 1);
}

}catch (\Throwable $th) {
    log::create([
        'mensagem'=>'Erro ao cadastrar carro',
         



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
            $user=Carro::where('id',$id)->update([
                'modelo'=>$req->modelo,
                'vc_path'=>$req->vc_path,
                'marca'=>$req->marca,
                'estrelas'=>$req->estrelas,
                'combustivel'=>$req->combustivel,
                'preco'=>$req->preco,
                'lugares'=>$req->lugares,
                'espaco'=>$req->espaco,
                'id_user'=>$id_user,
                'id_categoria'=>$req->id_categoria
               
            ]);
           
    return redirect()->back()->with('editada', 1);
        }
       } catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao editar carro',
             
    
        ]);
    return redirect()->back()->with('editada_f', 1);
}
}


public function delete($id){
    try{

    
    
    Carro::where('id', $id)->delete();
    return redirect()->back()->with('eliminada', 1);
}catch (\Throwable $th) {
    log::create([
        'mensagem'=>'Erro ao deletar carro carro',
         

    ]);

    return redirect()->back()->with('eliminada_f', 1);
}
}
}


