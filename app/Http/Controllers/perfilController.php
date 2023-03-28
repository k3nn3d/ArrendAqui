<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use Illuminate\Support\Facades\Auth;

class perfilController extends Controller
{
    //
    public function index(){
        $id=Auth::user()->id;
        $casas=Casa::where('id_user',$id)->get();
        return view('site.perfil.index', compact('casas'));
    }
}
