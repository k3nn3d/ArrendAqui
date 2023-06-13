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
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //
    public function index(){
        $categorias=Categoria::get();
        $provincias=provincia::get();
        $municipios=municipio::get();
        $aluguels=aluguel::get();
        
        $casas=Casa::with('reserva')->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('users','users.id','casas.id_user')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->select('casas.*','municipios.name as municipio', 'provincias.name as provincia','users.id as user_id','unidades.name as unidade_name')
        ->get();
        $comentarios=Comentario::join('users','users.id','comentarios.id_user')
        ->select('comentarios.*','users.vc_path as foto_user','users.name as name_user','users.lastname as lastname_user','users.vc_tipo_utilizador as tipo')
        ->get();
        $casas_destaque=Casa::with('reserva')->where('casas.estado','publicado')->where('casas.plano','!=','free')->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio', 'users.ativo as user_ativo','users.lastname as lastname_user','users.name as user_name','provincias.name as provincia', 'users.id as user_id','unidades.name as unidade_name')
        ->orderBy('plano','DESC')->get();
        $num_casas_alugadas=Casa::join('aluguels','aluguels.id_casa','casas.id')->where('aluguels.estado','Reservado')->count();
        $num_casas=Casa::count();
        $num_casas_para_aluguel=Casa::where('estado','publicado')->count();
        $num_senhorio=User::where('vc_tipo_utilizador',5)->count();
        return view('site.home.index', compact('casas','aluguels','casas_destaque', 'comentarios','municipios','provincias','categorias','num_casas_alugadas','num_casas','num_casas_para_aluguel','num_senhorio'));
    }

    public function gerar_pdf(){
        $num_casas_alugadas=Casa::join('aluguels','aluguels.id_casa','casas.id')->where('aluguels.estado','Reservado')->count();
        $num_casas=Casa::count();
        $num_casas_para_aluguel=Casa::where('estado','publicado')->count();
        $num_senhorio=User::where('vc_tipo_utilizador',5)->count();
        $num_motorista=User::where('vc_tipo_utilizador',3)->count();
        $num_clinete=User::where('vc_tipo_utilizador',6)->count();
    

         $pdf= Pdf::loadview('admin.pdf.pdf',compact('num_casas_alugadas','num_casas','num_casas_para_aluguel','num_senhorio','num_motorista','num_cliente'));
         return $pdf->stream();
    }
    public function voltar(){


        return redirect()->route('user.aluguel',Auth::user()->id);
    }
}
