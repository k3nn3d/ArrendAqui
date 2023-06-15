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
use App\Models\log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
class RelatorioController extends Controller
{
    //
    //$validator = Validator::make($request->all(), [
   //     'data' => 'required|date|before_or_equal:'.now(),
   /* ], [
        'data.required' => 'O campo data é obrigatório.',
        'data.date' => 'O campo data deve ser uma data válida.',
        'data.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }*/
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
        //dd($req->inicio);
        $validator = Validator::make($req->all(), [
       'fim' => 'required|before_or_equal:'.now(),
       'inicio' => 'required|before_or_equal:'.now(),
    ], [
        'inicio.required' => 'O campo data é obrigatório*.',
        'inicio.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
        'fim.required' => 'O campo data é obrigatório*.',
        'fim.before_or_equal' => 'A data deve ser anterior ou igual à data atual.',
  
    ]);

    if ($validator->fails()) {
       // dd($validator);
        return redirect()->back()->withErrors($validator)->withInput();
    }
       $startDate = $req->inicio; // Data de início do intervalo
       $endDate = $req->fim; // Data de término do intervalo

       $users = User::query()
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->get();


     
        $pdf= Pdf::loadview('admin.pdf.relatorio_users',compact('users'));
        return $pdf->stream('Relatório de Usuários');    


    }
    public function relatorio_casas(Request $req){

          //dd($req->inicio);
        $validator = Validator::make($req->all(), [
       'fim' => 'required|before_or_equal:'.now(),
       'inicio' => 'required|before_or_equal:'.now(),
    ], [
        'inicio.required' => 'O campo data é obrigatório*.',
        'inicio.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
        'fim.required' => 'O campo data é obrigatório*.',
        'fim.before_or_equal' => 'A data deve ser anterior ou igual à data atual.',
  
    ]);

    if ($validator->fails()) {
       // dd($validator);
        return redirect()->back()->withErrors($validator)->withInput();
    }
       $startDate = $req->inicio; // Data de início do intervalo
       $endDate = $req->fim; // Data de término do intervalo

       $imoveis = Casa::query()
        ->whereDate('casas.created_at', '>=', $startDate)
        ->whereDate('casas.created_at', '<=', $endDate);
        
        $imoveis= $imoveis->join('provincias','provincias.id','casas.id_provincia')
        ->join('municipios','municipios.id','casas.id_municipio')
        ->join('users','users.id','casas.id_user')
        ->select('casas.*','provincias.name as provincia', 'municipios.name as municipio','users.name as username','users.lastname as userlastname')
        ->get();

     
        $pdf= Pdf::loadview('admin.pdf.relatorio_casas',compact('imoveis'));
        return $pdf->stream('Relatório de Casas');    


        
    }
    public function relatorio_carros(Request $req){

          //dd($req->inicio);
        $validator = Validator::make($req->all(), [
       'fim' => 'required|before_or_equal:'.now(),
       'inicio' => 'required|before_or_equal:'.now(),
    ], [
        'inicio.required' => 'O campo data é obrigatório*.',
        'inicio.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
        'fim.required' => 'O campo data é obrigatório*.',
        'fim.before_or_equal' => 'A data deve ser anterior ou igual à data atual.',
  
    ]);

    if ($validator->fails()) {
       // dd($validator);
        return redirect()->back()->withErrors($validator)->withInput();
    }
       $startDate = $req->inicio; // Data de início do intervalo
       $endDate = $req->fim; // Data de término do intervalo

       $users = Carro::query()
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->get();


     
        $pdf= Pdf::loadview('admin.pdf.relatorio_carros',compact('users'));
        return $pdf->stream('Relatório de Carros');    


        
    }
    public function relatorio_reservas(Request $req){


          //dd($req->inicio);
        $validator = Validator::make($req->all(), [
       'fim' => 'required|before_or_equal:'.now(),
       'inicio' => 'required|before_or_equal:'.now(),
    ], [
        'inicio.required' => 'O campo data é obrigatório*.',
        'inicio.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
        'fim.required' => 'O campo data é obrigatório*.',
        'fim.before_or_equal' => 'A data deve ser anterior ou igual à data atual.',
  
    ]);

    if ($validator->fails()) {
       // dd($validator);
        return redirect()->back()->withErrors($validator)->withInput();
    }
       $startDate = $req->inicio; // Data de início do intervalo
       $endDate = $req->fim; // Data de término do intervalo

       $users = aluguel::query()
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
        ->get();


     
        $pdf= Pdf::loadview('admin.pdf.relatorio_arrendamentos',compact('users'));
        return $pdf->stream('Relatório de Usuários');    


        
    }
    public function relatorio_casas_mais(Request $req){
          //dd($req->inicio);
        $validator = Validator::make($req->all(), [
       'fim' => 'required|before_or_equal:'.now(),
       'inicio' => 'required|before_or_equal:'.now(),
    ], [
        'inicio.required' => 'O campo data é obrigatório*.',
        'inicio.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
        'fim.required' => 'O campo data é obrigatório*.',
        'fim.before_or_equal' => 'A data deve ser anterior ou igual à data atual.',
  
    ]);

    if ($validator->fails()) {
       // dd($validator);
        return redirect()->back()->withErrors($validator)->withInput();
    }
       $startDate = $req->inicio; // Data de início do intervalo
       $endDate = $req->fim; // Data de término do intervalo

       $imoveis_mais= Casa::query()
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate);
        $imoveis_mais = $imoveis_mais->where('aluguels.estado','Reservado')->join('aluguels','aluguels.id_casa','casas.id')
        ->join('categorias','categorias.id','casas.id_categoria')
        ->select('casas.*','categorias.name as cat_name', [DB::raw('COUNT(aluguels.id) as total')])
        ->groupBy('casas.id')
        ->orderBy('total');
       

     
        $pdf= Pdf::loadview('admin.pdf.relatorio_casas_mais',compact('imoveis_mais'));
        return $pdf->stream('Relatório de Usuários');    


        
    }
    public function relatorio_logs(Request $req){
        //dd($req->inicio);
      $validator = Validator::make($req->all(), [
     'fim' => 'required|before_or_equal:'.now(),
     'inicio' => 'required|before_or_equal:'.now(),
  ], [
      'inicio.required' => 'O campo data é obrigatório*.',
      'inicio.before_or_equal' => 'O campo data deve ser anterior ou igual à data atual.',
      'fim.required' => 'O campo data é obrigatório*.',
      'fim.before_or_equal' => 'A data deve ser anterior ou igual à data atual.',

  ]);

  if ($validator->fails()) {
     // dd($validator);
      return redirect()->back()->withErrors($validator)->withInput();
  }
     $startDate = $req->inicio; // Data de início do intervalo
     $endDate = $req->fim; // Data de término do intervalo

     $logs = log::query()
      ->whereDate('created_at', '>=', $startDate)
      ->whereDate('created_at', '<=', $endDate)->get();
      
      $pdf= Pdf::loadview('admin.pdf.relatorio_logs',compact('logs'));
      return $pdf->stream('Relatório de Logs');    


      
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
    public function _logs(){
        return view('admin.relatorio.logs');
        
    }
}
