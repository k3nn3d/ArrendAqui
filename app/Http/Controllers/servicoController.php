<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class servicoController extends Controller
{
    //
    public function index(){
        $comentarios=Comentario::join('users','users.id','comentarios.id_user')
        ->select('comentarios.*','users.vc_path as foto_user','users.name as name_user','users.lastname as lastname_user','users.vc_tipo_utilizador as tipo')
        ->get();
        return view('site.servicos.services', compact('comentarios'));
    }
}
