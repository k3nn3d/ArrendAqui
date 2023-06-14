@extends('layouts.perfil.index')
@section('conteudo')
<div class="pcoded-main-container" >
    <div class="pcoded-content">
<div class="col-lg-12 col-md-12">
    <div class="card chat-card">
        <div class="card-header">
                
                <div style="position: relative;
                display: inline-block;">
                <img src="{{asset($user_2->vc_path)}}" alt="user-image" style="width: 40px; height:40px;border-radius:20px">
                @if($user_2->ativo ==1)
                <div style="position: absolute;
                top: 30px;
                right: 2px;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: rgb(0, 247, 0);
              "></div>
              @else
              @endif
                </div>
                <h5>{{ $user_2->name }} {{ $user_2->lastname }}</h5>
                <br>
                </span>
                    @switch($user_2->vc_tipo_utilizador)
                        @case(1)
                            Administrador
                        @break
                        @case(2)
                            Gerente
                        @break
                        @case(3)
                            Motorista
                        @break
                        @case(5)
                            Senhorio
                        @break
                        @case(6)
                            Cliente
                        @break
                        @default
                        @endswitch
                <span> 
                
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button class="btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-close-cw">Fechar</i></button>
                    <button style="display: none" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i>Restore</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> Recarrecgar</a></li>
                        <li class="dropdown-item close-card"><a href="{{ route('site.chat.list') }}"><i class="feather icon-trash"></i>Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body" id="div-atualizar" style="height: 400px; overflow: auto; scroll-behavior: smooth;">
           
            @foreach($mensagem as $chat)
            
            @if($chat->id_mensagem==$user_2->id)
            <div class="row m-b-20 received-chat">
                
                <div class="col-auto p-r-0" >
                    
                    <img src="{{ asset($user_2->vc_path) }}" alt="user image" class="img-radius wid-40">
                </div>
                <div class="col">
                   
                    <div class="msg">
                        <p class="m-b-0">{{ $chat->mensagem }}</p>
                    </div>
                    <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>{{ $chat->created_at->format('h:i am') }}</p>
                </div>
            </div>
            @endif
            @if($chat->id_mensagem == Auth::user()->id)
            <div class="row m-b-20 send-chat">
                <div class="col">
                    <div class="msg">
                        <p class="m-b-0">{{ $chat->mensagem }}</p>
                    </div>
                    <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>{{ $chat->created_at->format('h:i am ') }}</p>
                </div>
                <div class="col-auto p-l-0">
                    <img src="{{asset(Auth::user()->vc_path)}}" alt="user image" class="img-radius wid-40">
                </div>
            </div>
            @endif

            <div class="row m-b-20 received-chat" style="display: none">
                <div class="col-auto p-r-0">
                    <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40">
                </div>
                <div class="col">
                    <div class="msg">
                        <p class="m-b-0">Nice to meet you!</p>
                        <img src="assets/images/widget/dashborad-1.jpg" alt="">
                        <img src="assets/images/widget/dashborad-3.jpg" alt="">
                    </div>
                    <p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>10:20am</p>
                </div>
            </div>
            
            @endforeach
            
            @empty($chat)
            <div style="text-align: center"> 
                <p>
                    Não há mensagens para esta conversa
                </p>
            </div>
            @endempty
           
            </div>
            <form action="{{route('site.chat.store',['id'=>$user_2->id ,'id_casa'=>$id_casa])}}" method="POST" enctype="multipart/form-data" style="padding: 1rem"> 
                @csrf
                <div class="input-group m-t-15">
                    <input type="text" name="mensagem" class="form-control" id="mensagem" placeholder="Escrever mensagem">
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
            </form>
        </div>
    </div>
    @if(Auth::user()->vc_tipo_utilizador)
    <div style="background-color: #f4f4f4; padding: 20px; text-align: center;">
        <div style="background-image: url('{{asset("imagens/carro.jpeg")}}'); background-size: cover; background-position: center; border-radius: 10px; padding: 40px; display: inline-block;">
            <h1 style="color: green; font-size: 24px;">
                Precisa de um carro para levar suas coisas?
                <br>
                <br>
                <a href="{{route('user.reservar.carro', $casa->id)}}" class="btn btn-primary" style="color: #000; text-decoration: none; font-weight: bold;">Alug'aqui</a>
            </h1>
        </div>
    </div>
    @endif
        
</div>

</div>


  
    <script>
        window.addEventListener('DOMContentLoaded', function() {
        var cardBody = document.querySelector('.card-body');
        cardBody.scrollTop = cardBody.scrollHeight;
        });

        
    </script>

  <script>


                
            
function atualizarInterface(mensagens) {
    // Limpe o conteúdo atual da div
    $('#div-atualizar').empty();

    // Percorra as mensagens recebidas e adicione-as à div
    mensagens.forEach(function(mensagem) {
        if (mensagem.id_mensagem == Auth::user().id) {
            // Mensagem enviada pelo usuário atual
            var mensagemHTML = '<div class="row m-b-20 send-chat">' +
                '<div class="col">' +
                '<div class="msg">' +
                '<p class="m-b-0">' + mensagem.mensagem + '</p>' +
                '</div>' +
                '<p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>' + mensagem.created_at + '</p>' +
                '</div>' +
                '<div class="col-auto p-l-0">' +
                '<img src="' + mensagem.vc_path + '" alt="user image" class="img-radius wid-40">' +
                '</div>' +
                '</div>';

            $('#div-atualizar').append(mensagemHTML);
        } else {
            // Mensagem recebida de outro usuário
            var mensagemHTML = '<div class="row m-b-20 received-chat">' +
                '<div class="col-auto p-r-0">' +
                '<img src="' + mensagem.vc_path + '" alt="user image" class="img-radius wid-40">' +
                '</div>' +
                '<div class="col">' +
                '<div class="msg">' +
                '<p class="m-b-0">' + mensagem.mensagem + '</p>' +
                '</div>' +
                '<p class="text-muted m-b-0"><i class="fa fa-clock-o m-r-10"></i>' + mensagem.created_at + '</p>' +
                '</div>' +
                '</div>';

            $('#div-atualizar').append(mensagemHTML);
        }
    });

    // Role a div para a última mensagem
    var divAtualizar = document.getElementById('div-atualizar');
    divAtualizar.scrollTop = divAtualizar.scrollHeight;
}
success: function(response) {
    // Chame a função para atualizar a interface
    atualizarInterface(response);
},

</script>
  
@endsection