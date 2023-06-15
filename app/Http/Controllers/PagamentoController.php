<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\afiliado;
use App\Models\motorista;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Pagamento;
use App\Models\Pedido;



class PagamentoController extends Controller
{
    //
    public function index(){
        $users=User::where('id',Auth::user()->id)
        ->get();
        $users2=User::where('users.id', Auth::user()->id)
        ->join('pagamentos','pagamentos.id_user','users.id')
        ->select('users.*','pagamentos.valor as valorPago','pagamentos.comprovativo as comprovativoPagamento','pagamentos.estado as estadoPagamento')
        ->orderBy('users.id','desc')
        ->get();
        $afiliado=afiliado::orderBy('id','desc')->first();
        return view('site.perfil.pagamentos',compact('users','afiliado','users2'));
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



public function pagar_pedido(Pedido $pedido){

    return view('site.pagamento.pedido',compact('pedido'));
}
public function pagar_pedido_p(Request $req, Pedido $pedido){

    $pagamento = Pagamento::create([
        'id_user'=>Auth::user()->id,
        'titular'=>$req->titular,
        'valor'=>$req->valor,
    ]);
    $pontos= afiliado::orderBy('id','desc')->first()->valor;
    $motorista = motorista::orderBy('id','desc')->first()->valor; 
    $percent=$req->valor/$motorista;
    $novos_pontos=($req->valor - $percent)/$pontos;
    $users=User::where('id',$pedido->id_motorista)
    ->update([
        'pontos'=>$novos_pontos,
    ]);

    if($req->file('comprovativo')){
    $req_imagem = $req->file('comprovativo');
    $extension=$req_imagem->extension();
    $imagem_name=md5($req_imagem->getClientOriginalName() . strtotime('now')) . "." . $extension;
    $destino=$req_imagem->move(public_path("imagens/casas"), $imagem_name);
    $dir = "imagens/casas";
    $caminho=$dir. "/". $imagem_name; 
    $pagamento->update([
        'comprovativo'=>$caminho,
    ]);
}
    return redirect()->route('user.pedido')->with('pago',1);
}
}
