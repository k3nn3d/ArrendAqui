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
use App\Models\User;
use App\Models\GaleriaCasa;
use App\Models\aluguel;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Storage;

class casaController extends Controller
{
    //
    public function index(Request $req ){
        $aluguels=aluguel::get();
        $casas=Casa::with('reserva')->where('casas.estado','publicado')
        ->join('categorias','categorias.id','casas.id_categoria')
        ->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio', 'categorias.name as cat_name','users.lastname as lastname_user', 'provincias.name as provincia','users.id as user_id','users.name as user_name', 'unidades.name as unidade_name')
        ->get();
        $casas_destaque=Casa::with('reserva')->where('casas.estado','publicado')
        ->where('plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
        ->join('categorias','categorias.id','casas.id_categoria')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio','users.lastname as lastname_user', 'categorias.name as cat_name', 'provincias.name as provincia','users.id as user_id','users.name as user_name','unidades.name as unidade_name')
        ->orderBy('plano','DESC')->get();
        

        $id_municipio=municipio::where('name','like',"%$req->pesquisa%")->get('id')->toArray();
        $id_provincia=provincia::where('name','like',"%$req->pesquisa%")->get('id')->toArray();
        $categorias=Categoria::get();
        $sub_categorias=sub_categoria::get();
        $provincias=provincia::get();
        $municipios=municipio::get();
        $unidades=Unidade::get();
       
        
        if($req->provincia_id && $req->municipio_id && $req->preco_min && $req->preco_max  && $req->categoria_id  ){
            //dd($req->municipio_id);
           // dd($req->categoria_id);
            $casas=Casa::with('reserva')->where('casas.estado','publicado')
            ->where('casas.id_provincia',$req->provincia_id)
            ->where('casas.id_municipio',$req->municipio_id)
            ->where('casas.id_categoria',$req->categoria_id)
            ->where('casas.preco','<=',$req->preco_max)
            ->where('casas.preco','>=',$req->preco_min)
            ->join('categorias','categorias.id','casas.id_categoria')
            ->join('provincias','provincias.id','casas.id_provincia')
            ->join('municipios','municipios.id','casas.id_municipio')
            ->join('unidades','unidades.id','casas.id_unidade')
            ->join('users','users.id','casas.id_user')
            ->select('casas.*','municipios.name as municipio','users.lastname as lastname_user', 'categorias.name as cat_name', 'provincias.name as provincia','users.id as user_id','users.name as user_name', 'unidades.name as unidade_name')
            ->get();
            
            $casas_destaque=Casa::with('reserva')->where('casas.estado','publicado')
            ->where('casas.id_provincia',$req->provincia_id)
            ->where('casas.id_municipio',$req->municipio_id)
            ->where('casas.id_categoria',$req->categoria_id)
            ->where('casas.preco','<=',$req->preco_max)
            ->where('casas.preco','>=',$req->preco_min)
            ->where('casas.plano','!=','free')->join('provincias','provincias.id','casas.id_provincia')
            ->join('municipios','municipios.id','casas.id_municipio')
            ->join('unidades','unidades.id','casas.id_unidade')
            ->join('categorias','categorias.id','casas.id_categoria')
            ->join('users','users.id','casas.id_user')
            ->select('casas.*','municipios.name as municipio','users.lastname as lastname_user', 'categorias.name as cat_name', 'provincias.name as provincia','users.id as user_id','users.name as user_name','unidades.name as unidade_name')
            ->orderBy('plano','DESC')->get();
            

        }
       // dd($casas);
        
    return view('site.casa.index', compact('casas','aluguels','categorias','sub_categorias','casas_destaque','provincias','municipios','unidades'));
}


public function show($id){
    $aluguels=aluguel::get();
    $casa1=Casa::with('reserva')->where('casas.estado','publicado')
    ->where('casas.id',$id)->join('users','users.id','id_user')
    ->join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('unidades','unidades.id','casas.id_unidade')
    ->join('categorias','categorias.id','casas.id_categoria')
    ->select('casas.*','users.name as name_user','users.telefone as telefone_user','users.email as email_user','users.biografia as biografia_user', 'categorias.name as cat_name','users.name as user_name','users.lastname as lastname_user','users.vc_path as foto_user','users.id as user_id','municipios.name as municipio', 'provincias.name as provincia','unidades.name as unidade_name')
    ->first();
    $casas=Casa::with('reserva')->where('casas.estado','publicado')
    ->join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('users','users.id','casas.id_user')
    ->join('unidades','unidades.id','casas.id_unidade')
    ->select('casas.*','municipios.name as municipio', 'users.lastname as lastname_user','users.name as user_name','provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
    ->get();
    $casas_destaque=Casa::with('reserva')->where('casas.estado','publicado')
    ->where('plano','!=','free')
    ->where('id_categoria',$casa1->id_categoria)->join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('users','users.id','casas.id_user')
    ->join('unidades','unidades.id','casas.id_unidade')
    ->select('casas.*','municipios.name as municipio','users.lastname as lastname_user','users.name as user_name', 'provincias.name as provincia','users.id as user_id', 'unidades.name as unidade_name')
    ->orderBy('plano','DESC')->get();
   // dd([$casa->latitude,$casa->longitude]);
    $galeria=GaleriaCasa::where('id_casa',$casa1->id)->get();
    return view('site.casa.productDetails', compact('casa1','aluguels','casas','casas_destaque','galeria'));

}



public function index2(Request $req){
    $casa=Casa::join('users','users.id','casas.id_user')
    ->select('casas.*','users.name as userName','users.lastname as userLastname')
    ->get();
    $categoria=Categoria::get();
    $sub_categoria=sub_categoria::get();
    $unidades=Unidade::get();

    $categorias=Categoria::get();
    $sub_categorias=sub_categoria::get();
    $provincias=provincia::get();
    $municipios=municipio::get();         
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

    return view('admin.casa.index', compact('casa','sub_id','municipios','unidades','name','categoria','provincias','sub_categoria','categorias','sub_categorias'));

    
    


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
    $filtro_municipio=0;
    //dd($filtro_municipio);
    return view('site.casa.create', compact('unidades','filtro_municipio','categorias','sub_categorias','provincias','municipios'));

}


public function store(Request $req){


    
    try{

       
       //Obtendo o endereço da casa
        $provincia_name = provincia::where('id', $req->provincia)->value('name');
        $municipio_name = municipio::where('id', $req->municipio)->value('name');

        // URL da API para obter a latitude e longitude
        $endereco = "$req->bairro,$municipio_name,$provincia_name,Angola";
        $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($endereco);

        // Faz a solicitação HTTP para a API usando a biblioteca Http do Laravel
       if(Http::withOptions(['verify' => 'certificados_ssl/cacert.pem'])->get($url))
       { 
        $response = Http::withOptions([
            'verify' => 'certificados_ssl/cacert.pem' // caminho para o arquivo de certificado SSL
        ])->get($url);

        // Extrai a latitude e longitude do conteúdo da resposta JSON
        $data = json_decode($response->body());
        if (!empty($data)) {
            $latitude = $data[0]->lat;
            $longitude = $data[0]->lon;
        } else {
            // Tratar caso não tenha nenhum resultado retornado pela API
            $userIP = $_SERVER['REMOTE_ADDR'];
            $location = Location::get('80.88.9.0');
            $latitude = $location->latitude;
            $longitude = $location->longitude;
        }
    }else{
         // Tratar caso não tenha nenhum resultado retornado pela API
         $userIP = $_SERVER['REMOTE_ADDR'];
         $location = Location::get('80.88.9.0');
         $latitude = $location->latitude;
         $longitude = $location->longitude;
    }

        $id_user=Auth::user()->id; 

        /* 
        if($req->hasFile('vc_path') && $req->plano == 'free'){
           //Otendo caminho completo da imagem
            //$temp_file = tempnam(sys_get_temp_dir(), 'img');
            //file_put_contents($temp_file, base64_decode($imagem));
            //$caminho_completo = realpath($temp_file);
            //dd($caminho_completo);
            // Imagem VC_PATH
            //dd('Passou');
            $req_imagem=$req->file('vc_path');
           // dd($req_imagem);
            $extension=$req_imagem->extension();
            $imagem_name="comparar". "." . $extension;
            $destino=$req_imagem->move(public_path("imagens/casas_comparar"), $imagem_name);
            $dir = "imagens/casas_comparar";
            $caminho1=$dir. "/". $imagem_name; 
            
           
           $imagem=$req->file('vc_path');
            $caminho=$imagem->store('imagens/galeria','public');*/

            //Obtendo casas
           /* $casas_detc=Casa::get();

              //reconhecimento de imagem pixel por pixel com php
            
            foreach ($casas_detc as $key => $casa_detc) {
                
            
            // Carregar as duas imagens
          //  $img1 = imagecreatefromjpeg("'$caminho'");
            //$img2 = imagecreatefromjpeg("'$casa_detc->vc_path'");
            // Lê o conteúdo do arquivo de imagem em uma string
            $image_data1 = file_get_contents(public_path($caminho1));
            

            // Cria a imagem a partir da string de dados
            $img1 = imagecreatefromstring($image_data1);
             // Lê o conteúdo do arquivo de imagem em uma string
             $image_data2 = file_get_contents(public_path($casa_detc->vc_path));
             

             // Cria a imagem a partir da string de dados
             $img2 = imagecreatefromstring($image_data2);
            
            // Obter as dimensões das imagens
            $width1 = imagesx($img1);
            $height1 = imagesy($img1);
            $width2 = imagesx($img2);
            $height2 = imagesy($img2);

            // Verificar se as imagens têm as mesmas dimensões
           /* if ($width1 != $width2 || $height1 != $height2) {
                echo "As imagens têm dimensões diferentes.";
                exit;
            }

            // Calcular a diferença pixel a pixel
            $difference = 0;
            
            
            for ($y = 0; $y < $height1 && $y < $height2; $y++) {
                for ($x = 0; $x < $width1 && $x < $width2; $x++) {
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
             // Liberar a memória usada pelas imagens
             imagedestroy($img1);
             imagedestroy($img2);

           
            


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

           
        }
        }

*/

    //fim
  
 

            $casa=Casa::create([
                'bairro'=>$req->bairro,
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
                'latitude'=>$latitude,
                'longitude'=>$latitude
            ]);

            if($req->file('vc_path')){
            $imagens = $req->file('vc_path');
            forEach($imagens as $key => $imagem){
                if($imagem->isValid()){
                    if($key == 0){
                        $req_imagem = $imagem;
                        $extension=$req_imagem->extension();
                        $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                        $destino=$req_imagem->move(public_path("imagens/casas"), $imagem_name);
                        $dir = "imagens/casas";
                        $caminho=$dir. "/". $imagem_name; 
                        $casa->update([

                            'vc_path'=>$caminho,
                        ]);
                }else{

                        $req_imagem = $imagem;
                        $extension=$req_imagem->extension();
                        $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                        $destino=$req_imagem->move(public_path("imagens/casas"), $imagem_name);
                        $dir = "imagens/casas";
                        $caminho=$dir. "/". $imagem_name;
                        GaleriaCasa::create([
                            'id_casa'=>$casa->id,
                            'vc_path'=>$caminho
                        ]);
                    }
                }
            }
        }

            if($req->plano){
                $casa->update([
                    'plano'=>$req->plano
                ]);
            }
            if($req->id_user){
                $casa->update([
                    'id_user'=>$req->id_user
                ]);
            }
            if($req->hasFile('planta') && $req->file('planta')->isValid()){
                $req_imagem=$req->file('planta');
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("pdf/casa/planta"), $imagem_name);
                $dir = "pdf/casa/planta";
                $caminho=$dir. "/". $imagem_name; 
                $casa->update([
                    'planta'=>$caminho,
                ]);

            }
            if($req->hasFile('propriedade') && $req->file('propriedade')->isValid()){
                $req_imagem=$req->file('propriedade');
                $extension=$req_imagem->extension();
                $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
                $destino=$req_imagem->move(public_path("pdf/casa/propriedade"), $imagem_name);
                $dir = "pdf/casa/propriedade";
                $caminho=$dir. "/". $imagem_name; 
                $casa->update([
                    'propriedade'=>$caminho,
                ]);

            }
           
          
          return redirect()->route('casas')->with('cadastrada', 1);


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
                'bairro'=>$req->bairro,
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
    $casa=Casa::where('id', $id)->first();
    return view('site.casa.promover', compact('casa'));
}
public function analisar($id){
 
    $casa = Casa::where('casas.id',$id)
    ->join('provincias','provincias.id','casas.id_provincia')
    ->join('municipios','municipios.id','casas.id_municipio')
    ->join('users','users.id','casas.id_user')
    ->select('casas.*','provincias.name as provincia','municipios.name as municipio','users.name as userName','users.lastname as userLastname','users.bi as userBi','users.vc_path as userFoto')
    ->first();
    //dd($casa->id);

    return view('admin.casa.analisar',compact('casa'));

}
public function analisar_confirm( Request $req , $id){
    if($req->doc ==1 && $req->comp_doc==1 && $req->apto==1){
        $casa = Casa::where('id',$id)->update([
            'estado'=>'publicado'

        ]);
        if($casa->plano =='free'){        
            $data =  date('Y-m') . (int) date('d') + 7 ;
            $data = date('d/m/Y', strtotime($data));
            Casa::where('id',$casa->id)->update([
            'plano_expiracao'=>$data,
        ]);}

        if($casa->plano =='2'){
            $data =  date('Y') . (int) date('m') + 1 . date('d');
            $data = date('d/m/Y', strtotime($data));
            Casa::where('id',$casa->id)->update([
                'plano_expiracao'=>$data,
            ]);}

        if($casa->plano =='3'){
            $data =  date('Y') . (int) date('m') + 2 . date('d');
            $data = date('d/m/Y', strtotime($data));
            Casa::where('id',$casa->id)->update([
                'plano_expiracao'=>$data,
            ]);}
}
    else{
        return redirect()->route('admin.casa')->with('publicado_f',1);

    }
    return redirect()->route('admin.casa')->with('publicado',1);
    
}
}







