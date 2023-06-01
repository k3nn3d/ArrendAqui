<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\afiliado;
use App\Models\motorista;
use App\Models\User;
use App\Models\Pagamento;



class PagamentoController extends Controller
{
    //
    public function index(){
        return view('site.perfil.pagamentos');
    }

    public function pagar_afiliado(Request $req, $id){

        $user=User::find($id);
        $afiliado=afiliado::orderBy('id','desc')->first();
        $novos_pontos=$user->pontos - ($req->valor/$afiliado->valor);

        

        $req_imagem=$req->file('comprovativo');
        $extension=$req_imagem->extension();
        $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $destino=$req_imagem->move(public_path("imagens/pagamentos"), $imagem_name);
        $dir = "imagens/pagamentos";
        $caminho=$dir. "/". $imagem_name; 
      
        Pagamento::create([
            'id_user'=>$id,
            'valor'=>$req->valor,
            'comprovativo'=>$caminho,
        ]);
        
        User::where('id',$id)->update([
            'pontos'=>$novos_pontos
        ]);
        return redirect()->back()->with('pagamento',1);


   }
   public function pagar_motorista(Request $request, $id){
        
    $req_imagem=$req->file('comprovativo');
    $extension=$req_imagem->extension();
    $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
    $destino=$req_imagem->move(public_path("imagens/pagamentos"), $imagem_name);
    $dir = "imagens/pagamentos";
    $caminho=$dir. "/". $imagem_name; 
    Pagamento::create([
        'id_user'=>$id,
        'valor'=>$req->valor,
        'comprovativo'=>$caminho,
    ]);


}
}
