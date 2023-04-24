<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use App\Models\aluguel;
use App\Models\provincia;
use App\Models\município;
use App\Models\Unidade;
use App\Models\Carro;
use App\Models\chat;
use App\Models\Categoria;
use App\Models\sub_categoria;

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
}
