<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use App\Models\User;

class sobreController extends Controller
{
     //
     public function index(){
        $num_casas_alugadas=Casa::join('aluguels','aluguels.id_casa','casas.id')->where('aluguels.estado','1')->count();
        $num_casas=Casa::count();
        $num_casas_para_aluguel=Casa::where('estado',1)->count();
        $num_senhorio=User::where('vc_tipo_utilizador',5)->count();
        return view('site.sobre.about', compact('num_casas_para_aluguel','num_casas_alugadas','num_senhorio','num_casas'));
    }
}

