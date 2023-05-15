<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aluguel;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back()->with('reservado',1);
    }
    public function update($id){
        aluguel::where('id',$id)->update([
           'estado'=>'Reservado'
        ]);
        return redirect()->back()->with('reservado',1);
    }
    public function delete($id){
       
        aluguel::where('id',$id)->delete();
        return redirect()->back()->with('reservado_eliminada',1);
    }
}
