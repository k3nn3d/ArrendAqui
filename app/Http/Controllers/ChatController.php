<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chat;
use App\Models\Carro;
use App\Models\motorista;
use App\Models\aluguel;
use App\Models\Casa;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class ChatController extends Controller
{
    //
    public function index($id, $casa_id){
        $id2=Auth::user()->id;
    
        $dados['carros']=Carro::where('id_user',$id)->first();
        $dados['casas']=Casa::where('id_user',$id)->first();
        
        $dados['user_2']=User::where('id', $id)->first();
        $dados['casa']=Casa::where('id',$casa_id)->first();
        if(chat::where('user_1',$id2)->where('user_2',$id)->first()){
            
            $dados['mensagem']=chat::
            orderBy('id','asc')->simplePaginate(6);
            return view('site.chat.index', $dados);

        }else{
            
          
            $dados['mensagem']=chat::
            orderBy('id','asc')->simplePaginate(6);
            return view('site.chat.index', $dados);

        }
     
       

        return view('site.chat.index', $dados);
    }
    public function list(){
        $id2=Auth::user()->id;
        
       // $dados['user']=User::where('id',$id)->first('id');
        //$dados['users']=User::where('id',$dados['user']->id)->first();
        if(chat::where('user_1',$id2)->first() !=false){
            
            $dados['mensagem']=chat::where('chats.user_1',$id2)
            ->join('users','users.id','chats.user_2')
            ->select('chats.*','users.name as user_name','users.vc_path as user_foto','users.id as user_id')
            ->orderBy('id','desc')->simplePaginate(10);
             
        return view('site.chat.list', $dados);
            
        }else{
            $dados['mensagem']=chat::where('chats.user_2',$id2)
            ->join('users','users.id','chats.user_1')
            ->select('chats.*','users.name as user_name','users.vc_path as user_foto','users.id as user_id')
            ->orderBy('id','desc')->simplePaginate(10);
         
        return view('site.chat.list', $dados);
        
        }
        
        return view('site.chat.list', $dados);
    }


    public function store(Request $req, $id){
        $id2=Auth::user()->id;
            chat::create([
                'user_1'=>$id2,
                'user_2'=>$id,
                'mensagem'=>$req->mensagem,
                'id_mensagem'=>$id2
            ]);
            return redirect()->back();
       

    }
    public function delete($id){
        chat::destroy($id);
    }
}