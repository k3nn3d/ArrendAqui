<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Http;
use App\Models\Casa;
use App\Models\Categoria;
use App\Models\sub_categoria;
use App\Models\provincia;
use App\Models\municipio;
use App\Models\Unidade;
use App\Models\log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Stevebauman\Location\Facades\Location;

class casaController extends Controller
{
    //
    public function index(Request $req ){
        
        $casas=Casa::join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id', 'unidades.name as unidade_name')
        ->get();
        $casas_destaque=Casa::where('plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
        ->orderBy('plano','DESC')->get();
        

        $id_municipio=municipio::where('name','like',"%$req->pesquisa%")->get('id')->toArray();
        $id_provincia=provincia::where('name','like',"%$req->pesquisa%")->get('id')->toArray();
       
        $categorias=Categoria::get();
        $sub_categorias=sub_categoria::get();
        if($req->pesquisa){
            
           if(provincia::where('name','like',"%$req->pesquisa%") && municipio::where('name','like',"%$req->pesquisa%")){
         
                $nome=$req->pesquisa;
                
                $casas=Casa::where('casas.id_provincia', $id_provincia)->join('provincias','provincias.id','casas.id_provincia')
                ->join('municipios','municipios.id','casas.id_municipio')
                ->join('users','users.id','casas.id')
                ->join('unidades','unidades.id','casas.id_unidade')
                ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id', 'unidades.name as unidade_name')
                ->get();
             

                $casas_destaque=Casa::where('casas.id_provincia', $id_provincia)->where('plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
                ->join('municipios','municipios.id','casas.id_municipio')
                ->join('users','users.id','casas.id')
                ->join('unidades','unidades.id','casas.id_unidade')
                ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
                ->orderBy('plano','DESC')->get();
                
                return view('site.casa.index', compact('casas','categorias','sub_categorias','nome','casas_destaque'));
               
                
            }
          
            
            if(municipio::where('name','like',"%$req->pesquisa%")){
                
               
                $nome=$req->pesquisa;
                $casas=Casa::where('casas.id_municipio', $id_municipio)->join('provincias','provincias.id','casas.id_provincia')
                ->join('municipios','municipios.id','casas.id_municipio')
                ->join('users','users.id','casas.id')
                ->join('unidades','unidades.id','casas.id_unidade')
                ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
                ->get();
                

                $casas_destaque=Casa::where('casas.id_municipio', $id_municipio)->where('plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
                ->join('municipios','municipios.id','casas.id_municipio')
                ->join('users','users.id','casas.id')
                ->join('unidades','unidades.id','casas.id_unidade')
                ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
                ->orderBy('plano','DESC')->get();
               

               
                
                
                return view('site.casa.index', compact('casas','categorias','sub_categorias','nome','casas_destaque'));

            }

           
            
            if(provincia::where('name','like',"%$req->pesquisa%")){
             

               
                $casas=Casa::where('casas.id_provincia', $id_provincia)->join('provincias','provincias.id','casas.id_provincia')
                ->join('municipios','municipios.id','casas.id_municipio')
                ->join('users','users.id','casas.id')
                ->join('unidades','unidades.id','casas.id_unidade')
                ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id', 'unidades.name as unidade_name')
                ->get();
                $casas_destaque=Casa::where('casas.id_provincia', $id_provincia)->where('plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
                ->join('municipios','municipios.id','casas.id_municipio')
                ->join('users','users.id','casas.id')
                ->join('unidades','unidades.id','casas.id_unidade')
                ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
                ->orderBy('plano','DESC')->get();
                return view('site.casa.index', compact('casas','categorias','sub_categorias','casas_destaque'));
               
                
            }
                
           
            

        }
        
    return view('site.casa.index', compact('casas','categorias','sub_categorias','casas_destaque'));
}


public function show($id){
    $casa1=Casa::where('casas.id',$id)->join('users','users.id','id_user')
    ->join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('unidades','unidades.id','casas.id_unidade')
    ->select('casas.*','users.name as name_user','users.lastname as lastname_user','users.vc_path as foto_user','users.id as user_id','municipios.name as municipio', 'provincias.name as provincia','unidades.name as unidade_name')
    ->first();
    $casas=Casa::join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('users','users.id','casas.id_user')
    ->join('unidades','unidades.id','casas.id_unidade')
    ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
    ->get();
    $casas_destaque=Casa::where('plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('users','users.id','casas.id_user')
    ->join('unidades','unidades.id','casas.id_unidade')
    ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id', 'unidades.name as unidade_name')
    ->orderBy('plano','DESC')->get();
   // dd([$casa->latitude,$casa->longitude]);
    return view('site.casa.productDetails', compact('casa1','casas','casas_destaque'));

}



public function index2(Request $req){
    $casa=Casa::get();
    $categoria=Categoria::get();
    $sub_categoria=sub_categoria::get();
   
         
      if($req->sub_categoria_id){
        $casa=Casa::where('id_sub_categoria', $req->sub_categoria_id)->get();
       
        
    }

    if($req->name){
        $casa=Casa::where('name','like', "%$req->name%")->get();
      
    }

    if($req->sub_categoria_id && $req->name){
        $casa=Casa::where('id_sub_categoria', $req->sub_categoria_id)->where('name','like', "%$req->name%")->get();

    }
    $sub_id = $req->sub_categoria_id;
    $name = $req->name;

    return view('site.perfil.casas', compact('casa','sub_id','name','categoria','sub_categoria'));

    
    


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
    return view('site.casa.create', compact('unidades','categorias','sub_categorias','provincias','municipios'));

}


public function store(Request $req){


    
    try{
       
        //Obtendo o enderço da casa
        $provincia_name=provincia::where('id',$req->provincia)->value('name');
        $municipio_name=municipio::where('id',$req->municipio)->value('name');

            //código para obter a latitude e longitude pelo googlemaps
            // Insira sua chave de API do Google Maps Geocoding API
            $apiKey = 'AIzaSyCtgPlK7U7uu9A-boT1BCd6k1ICOCyR_Q0';

            // Endereço que você deseja obter a latitude e longitude
            $endereco = "'$req->rua,$municipio_name,$provincia_name,Angola'";

            // URL da API de Geocodificação do Google Maps
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$endereco&key=$apiKey";

            try {
                // Faz a solicitação HTTP para a API usando a biblioteca Http do Laravel
                $response = Http::withOptions([
                    'verify' => 'certificados_ssl/cacert.pem' // caminho para o arquivo de certificado SSL
                ])->get($url);

                // Extrai a latitude e longitude do objeto JSON retornado pela API
                $data = $response->json()['results'];
                if (!empty($data)) {
                    $data = $data[0]['geometry']['location'];
                    $latitude = $data['lat'];
                    $longitude = $data['lng'];
                } else {
                    // Tratar caso não tenha nenhum resultado retornado pela API
                    $userIP= $_SERVER['REMOTE_ADDR'];
                    $location=Location::get('80.88.9.0');
                    $latitude = $location->latitude;
                    $longitude = $location->longitude;
                }
                // processar a resposta
                $data = json_decode($response->getBody()->getContents(), true);

            } catch (RequestException $e) {
                echo $e->getMessage();
            }
 
          
        



  
    
        
         $id_user=Auth::user()->id; 

        
        if($req->hasFile('vc_path') && $req->file('vc_path')->isValid()){
            
           
            // Imagem VC_PATH
            $req_imagem=$req->file('vc_path');
            $extension=$req_imagem->extension();
            $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_imagem->move(public_path("imagens/galeria"), $imagem_name);
            $dir = "imagens/galeria";
            $caminho=$dir. "/". $imagem_name; 
           /* $imagem=$req->file('vc_path');
            $caminho=$imagem->store('imagens/galeria','public');*/

            //Obtendo casas
            $casas_detc=Casa::get();

              //reconhecimento de imagem pixel por pixel com php
            
            foreach ($casas_detc as $key => $casa_detc) {
                
            
            // Carregar as duas imagens
            $img1 = imagecreatefromjpeg("'$caminho'");
            $img2 = imagecreatefromjpeg("'$casa_detc->vc_path'");

            // Obter as dimensões das imagens
            $width1 = imagesx($img1);
            $height1 = imagesy($img1);
            $width2 = imagesx($img2);
            $height2 = imagesy($img2);

            // Verificar se as imagens têm as mesmas dimensões
           /* if ($width1 != $width2 || $height1 != $height2) {
                echo "As imagens têm dimensões diferentes.";
                exit;
            }*/

            // Calcular a diferença pixel a pixel
            $difference = 0;
            for ($y = 0; $y < $height1; $y++) {
                for ($x = 0; $x < $width1; $x++) {
                    $rgb1 = imagecolorat($img1, $x, $y);
                    $r1 = ($rgb1 >> 16) & 0xFF;
                    $g1 = ($rgb1 >> 8) & 0xFF;
                    $b1 = $rgb1 & 0xFF;

                    $rgb2 = imagecolorat($img2, $x, $y);
                    $r2 = ($rgb2 >> 16) & 0xFF;
                    $g2 = ($rgb2 >> 8) & 0xFF;
                    $b2 = $rgb2 & 0xFF;

                    $difference += abs($r1 - $r2) + abs($g1 - $g2) + abs($b1 - $b2);
                }
            }

            // Calcular a diferença média
            $difference /= ($width1 * $height1 * 3);

            // Verificar se as imagens são iguais
            if ($difference == 0) {
                //echo "As imagens são iguais.";
                return redirect()->back()->with('igualdade', 1);
            } 
            //else {
               // echo "As imagens são diferentes. A diferença média é de " . round($difference, 2) . ".";
            //}

            // Liberar a memória usada pelas imagens
            imagedestroy($img1);
            imagedestroy($img2);
        }




    //fim
  


            $casa=Casa::create([
                'name'=>$req->name,
                'rua'=>$req->rua,
                'preco'=>$req->preco,
                'quartos'=>$req->quartos,
                'casa_de_banho'=>$req->casa_de_banho,
                'id_categoria'=>$req->id_categoria,
                'id_sub_categoria'=>$req->id_sub_categoria,
                'id_provincia'=>$req->provincia,
                'id_municipio'=>$req->municipio,
                'id_unidade'=>$req->id_unidade,
                'id_user'=>$id_user,
                'cozinha'=>$req->cozinha,
                'descricao'=>$req->descricao,
                'vc_path'=>$caminho,
                'latitude'=>$latitude,
                'longitude'=>$latitude
             
            ]);
            if($req->plano){
                Casa::where('id',$casa->id)->update([
                    'plano'=>$req->plano
                ]);
            }
            if($req->id_user){
                Casa::where('id',$casa->id)->update([
                    'id_user'=>$req->id_user
                ]);
            }
        

           
          
          return redirect()->route('casas')->with('cadastrada', 1);
}else{
   
    $casa=Casa::create([
        'name'=>$req->name,
        'rua'=>$req->rua,
        'preco'=>$req->preco,
        'quartos'=>$req->quartos,
        'casa_de_banho'=>$req->casa_de_banho,
        'id_categotria'=>$req->id_categoria,
        'id_sub_categoria'=>$req->id_sub_categoria,
        'id_provincia'=>$req->provincia,
        'id_municipio'=>$req->municipio,
        'id_unidade'=>$req->id_unidade,
        'id_user'=>$id_user,
        'cozinha'=>$req->cozinha,
        'descricao'=>$req->descricao
     
    ]);
    return redirect()->route('casas')->with('cadastrada', 1);
}

}catch (\Throwable $th) {
    dd($th);
    
    log::create([
        'mensagem'=>'Erro ao cadastrar casa',
        

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
            $user=Casa::where('id',$id)->update([
                'name'=>$req->name,
               'descricao'=>$req->descricao,
                'vc_path'=>$caminho
              
               
            ]);
           
    return redirect()->back()->with('editada', 1);
        }
       } catch (\Throwable $th) {
        log::create([
            'mensagem'=>'Erro ao editar casa',
          
    
        ]);
    return redirect()->back()->with('editada_f', 1);
}
}


public function delete($id){
    try{

    
    
    Casa::where('id', $id)->delete();
    return redirect()->back()->with('eliminada', 1);
}catch (\Throwable $th) {
    log::create([
        'mensagem'=>'Erro ao deletar casa',
         

    ]);
    return redirect()->back()->with('eliminada_f', 1);
}
}
public function promover($id){
    $casa=Casa::where('id', $id)->get();
    return view('site.casa.promover', compact('casa'));
}

}







