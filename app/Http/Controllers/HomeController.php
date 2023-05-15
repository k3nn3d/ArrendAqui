<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use App\Models\Carro;
use App\Models\Categoria;
use App\Models\aluguel;
use App\Models\motorista;
use App\Models\provincia;
use App\Models\municipio;
use App\Models\Comentario;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    //
    public function index(){
        $categorias=Categoria::get();
        $provincias=provincia::get();
        $municipios=municipio::get();
        $aluguels=aluguel::get();
        
        $casas=Casa::join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('users','users.id','casas.id_user')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
        ->get();
        $comentarios=Comentario::join('users','users.id','comentarios.id_user')
        ->select('comentarios.*','users.vc_path as foto_user','users.name as name_user','users.lastname as lastname_user','users.vc_tipo_utilizador as tipo')
        ->get();
        $casas_destaque=Casa::where('casas.plano','!=',0)->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio', 'users.ativo as user_ativo','users.lastname as lastname_user','users.name as user_name','provincias.name as provincia', 'users.id as user_id','unidades.name as unidade_name')
        ->orderBy('plano','DESC')->get();
        $num_casas_alugadas=Casa::join('aluguels','aluguels.id_casa','casas.id')->where('aluguels.estado','1')->count();
        $num_casas=Casa::count();
        $num_casas_para_aluguel=Casa::where('estado',1)->count();
        $num_senhorio=User::where('vc_tipo_utilizador',5)->count();
        return view('site.home.index', compact('casas','aluguels','casas_destaque', 'comentarios','municipios','provincias','categorias','num_casas_alugadas','num_casas','num_casas_para_aluguel','num_senhorio'));
    }

    public function gerar_pdf(){
        $pdf= Pdf::loadview('admin.pdf.pdf');
         return $pdf->stream();
    }
}
