<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use App\Models\aluguel;
use App\Models\provincia;
use App\Models\município;
use App\Models\Unidade;
use App\Models\Carro;
use App\Models\User;
use App\Models\chat;
use App\Models\Categoria;
use App\Models\sub_categoria;
use App\Models\Pedido;

use Illuminate\Support\Facades\Auth;

class perfilController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;
        $data['casas']=Casa::where('id_user',$id)->count();
        $data['arrendamento_cli']=aluguel::where('id',$id)->count();
        $data['arrendamento_sen']=aluguel::where('casas.id_user',$id)
        ->join('casas','casas.id','aluguels.id_casa')
        ->select('aluguels.*','casas.name as name_ca')
        ->count();
        $data['chat']=chat::where('chats.user_1',$id)->count();
        $data['arrendamento_mot']=aluguel::where('carros.id_user',$id)
        ->join('carros','carros.id','id_carro')
        ->count();
        $data['carros']=Carro::where('id_user',$id)->count();
        return view('site.perfil.index', $data);
    }
    public function casas(){
        $id_user=Auth::user()->id;
        $aluguels=aluguel::get();
        $casas=Casa::where('casas.id_user',$id_user)
        ->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','municipios.name as municipio','users.lastname as lastname_user', 'provincias.name as provincia','users.id as user_id','users.name as user_name', 'unidades.name as unidade_name')
        ->get();

        return view('site.perfil.casas',compact('casas','aluguels'));
       }
       public function arrendamentos(){
        $id_user=Auth::user()->id;
        $aluguels=aluguel::get();
        $casas=Casa::with('reserva')
        ->where('casas.id_user',$id_user)
        ->join('aluguels','aluguels.id_casa','casas.id')
        ->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','aluguels.id_user')
        ->join('categorias','categorias.id','casas.id_categoria')
        ->select('casas.*','aluguels.created_at as aluguel_data','aluguels.id as aluguel_id','categorias.name as cat_name','aluguels.id_user as aluguel_id_user','aluguels.estado as aluguel_estado','municipios.name as municipio','users.lastname as lastname_user', 'provincias.name as provincia','users.id as user_id','users.name as user_name', 'unidades.name as unidade_name')
        ->orderBy('casas.id','asc')
        ->get();
        $casas1=Casa::with('reserva')
        ->where('aluguels.id_user',$id_user)
        ->join('aluguels','aluguels.id_casa','casas.id')
        ->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('unidades','unidades.id','casas.id_unidade')
        ->join('users','users.id','casas.id_user')
        ->join('categorias','categorias.id','casas.id_categoria')
        ->select('casas.*','aluguels.created_at as aluguel_data','aluguels.id as aluguel_id','aluguels.id_user as aluguel_id_user','categorias.name as cat_name','aluguels.estado as aluguel_estado','municipios.name as municipio','users.lastname as lastname_user', 'provincias.name as provincia','users.id as user_id','users.name as user_name', 'unidades.name as unidade_name')
        ->orderBy('casas.id','asc')
        ->get();
        $pedidos = Pedido::join('casas','casas.id','pedidos.id_casa')
        ->join('users','users.id','pedidos.id_user')
        ->select('pedidos.*','users.name as username','users.lastname as userLastname','casas.latitude as lat','casas.longitude as long','casas.vc_path as vc_path')
        ->where('pedidos.estado','Pendente')->get();
       
        return view('site.perfil.alugueis',compact('casas','aluguels','casas1','pedidos'));
       }

      public function convidados(Request $request)
      {
        $url= $request->getScheme() . '://' . $request->getHttpHost();
        $users = User::where('codigo_convite', Auth::user()->convite)->get();

        return view('site.perfil.convidados',compact('users','url'));
      }
}
