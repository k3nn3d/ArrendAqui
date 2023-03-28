<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Casa;
use App\Models\aluguel;

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



       return view('admin.painel.index', $data);
        }
}
