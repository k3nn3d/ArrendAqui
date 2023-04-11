<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Casa;
use App\Models\aluguel;
use DB;

class painelController extends Controller
{
    //
    public function index(){

         $data['total']=User::count();
         $data['alugadores']=User::where('vc_tipo_utilizador', 5)->count();
         $data['clientes']=User::where('vc_tipo_utilizador', 6)->count();
         $data['motoristas']=User::where('vc_tipo_utilizador', 3)->count();
         $data['afiliados']=User::where('vc_tipo_utilizador', 4)->count();
         $data['gerentes']=User::where('vc_tipo_utilizador', 2)->count();
         $data['admin']=User::where('vc_tipo_utilizador', 1)->count();
         $data['casa']=Casa::count();
         $data['aluguel']=aluguel::count();
          //Gráfico comprativo de usuários
         $userData= User::select([
          DB::raw('YEAR(created_at) as ano'),
          DB::raw('COUNT(*) as totals')
         ])
         ->groupBy('ano')
         ->orderBy('ano', 'asc')
         ->get();
        
          //preparando os arrays
         foreach($userData as $user){
          $ano[]=$user->ano;
          $totals[]=$user->totals;
         }
         //Customizando para ser interpretado pelo Js
         $userLabel="'Comparativo de Cadastro de usuários'";
         $userAno=implode(',',$ano);
         $userTotal=implode(',',$totals);

         //Gráfico comprativo de casas por categoria
         $casaData=Casa::join('aluguels','aluguels.id_casa','casas.id')
         ->join('categorias','categorias.id','casas.id_categoria')
         ->select([
          DB::raw('categorias.name as cat_name'),
          DB::raw('COUNT(*) as casa_total')
         ])
         ->groupBy('categorias.id')
         ->orderBy('categorias.id')
         ->get();

         
         foreach($casaData as $casa){
          $cat_name[]=$casa->cat_name;
          $casa_total[]=$casa->casa_total;
         }

         $casaLabel="'Comparativo de casas mais arrendadas consoante a categoria'";
         $cat_name=implode(',',$cat_name);
         $casa_total=implode(',',$casa_total);
         dd($casaData);

       return view('admin.painel.index', compact('userLabel','userAno', 'userTotal','cat_name','casa_total','casaLabel'), $data);
        }
}
