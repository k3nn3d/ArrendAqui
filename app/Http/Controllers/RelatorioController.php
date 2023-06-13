<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Casa;
use App\Models\Carro;
use App\Models\Categoria;
use App\Models\aluguel;
use App\Models\motorista;
use App\Models\provincia;
use App\Models\municipio;
use App\Models\Comentario;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    //
    public function gerar_relatorio_geral(){
        $num_casas_alugadas=Casa::join('aluguels','aluguels.id_casa','casas.id')->where('aluguels.estado','Reservado')->count();
        $num_casas=Casa::count();
        $num_casas_para_aluguel=Casa::where('estado','publicado')->count();
        $num_senhorio=User::where('vc_tipo_utilizador',5)->count();
        $num_motorista=User::where('vc_tipo_utilizador',3)->count();
        $num_cliente=User::where('vc_tipo_utilizador',6)->count();
    

         $pdf= Pdf::loadview('admin.pdf.pdf',compact('num_casas_alugadas','num_casas','num_casas_para_aluguel','num_senhorio','num_motorista','num_cliente'));
         return $pdf->stream();
    }

    public function relatorio_user(Request $req){

        
        $startDate = Carbon::parse($req->inicio); // Data de início do intervalo
        $endDate = Carbon::parse($req->fim); // Data de término do intervalo

        $users = DB::table('users')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

            
            return view('');

    }
    public function relatorio_casas(Request $req){
        
    }
    public function relatorio_carros(Request $req){
        
    }
    public function relatorio_reservas(Request $req){
        
    }
    public function relatorio_casas_mais(Request $req){
        
    }
    public function relatorio_reservas_carros(Request $req){
        
    }

    //VIEWS
    public function _user(){
        

        return view('admin.relatorio.user');

    }
    public function _casas(){
        return view('admin.relatorio.casas');
        
    }
    public function _carros(){
        return view('admin.relatorio.carros');
        
    }
    public function _reservas(){
        return view('admin.relatorio.reservas');
        
    }
    public function _casas_mais(){
        return view('admin.relatorio.casas_mais');
        
    }
    public function _reservas_carros(){
        return view('admin.relatorio.reservas_carros');
        
    }
}
