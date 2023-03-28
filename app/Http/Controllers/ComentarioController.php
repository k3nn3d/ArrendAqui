<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\log;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
       
            try{
                
    
            Comentario::create([
                'name'=>$req->name,
                'conteudo'=>$req->conteudo,
                'estrelas'=>$req->estrelas
            ]);
            return redirect()->back()->with('cadastrada', 1);
        }catch (\Throwable $th) {
            log::create([
                'mensagem'=>'Erro ao cadastrar província',
                 
        
            ]);
            return redirect()->back()->with('cadastrada_f', 1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        try{
                
    
            Comentario::where('id',$id)->update([
                'name'=>$req->name,
                'conteudo'=>$req->conteudo,
                'estrelas'=>$req->estrelas
            ]);
            return redirect()->back()->with('cadastrada', 1);
        }catch (\Throwable $th) {
            log::create([
                'mensagem'=>'Erro ao cadastrar província',
                 
        
            ]);
            return redirect()->back()->with('cadastrada_f', 1);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
