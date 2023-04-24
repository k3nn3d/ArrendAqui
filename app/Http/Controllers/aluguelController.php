<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aluguel;

class aluguelController extends Controller
{
    //
    public function index(){
        return view('admin.aluguel.index');
    }
    public function index2(){
        return view('site.perfil.alugueis');
    }
    public function create($id){
        return view('site.aluguel.index', compact('id'));
    }



    public function store($id){
        $user_id = Auth::user()->id;

        $arrendamento = aluguel::create([
           'id_user'=>$user_id,
           'id_casa'=>$id 
        ]);
        return redirect()->route('carros');
    }
}
