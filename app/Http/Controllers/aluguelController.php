<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
