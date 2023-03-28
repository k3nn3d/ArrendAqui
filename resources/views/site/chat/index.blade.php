@extends('layouts.perfil.index')
@section('conteudo')
<div class="pcoded-main-container">
    <div class="pcoded-content">
<div class="col-lg-12 col-md-12">
    <div class="card chat-card">
        <div class="card-header">
            
            <h5>
                @if( $user_2->vc_tipo_utilizador==5)
                Senhorio: {{ $user_2->name }} {{ $user_2->lastname }}
                @endif
                @if( $user_2->vc_tipo_utilizador==6)
                Alugador: {{ $user_2->name }} {{ $user_2->lastname }}
                @endif
                @if( $user_2->vc_tipo_utilizador==3)
                Motorista: {{ $user_2->name }} {{ $user_2->lastname }}
                @endif
            </h5>
            <div class="card-header-right">
                <div class="btn-group card-option">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> Expandir</span></a></li>
                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> Recarrecgar</a></li>
                        <li class="dropdown-item close-card"><a href="{{ route('site.chat.list') }}"><i class="feather icon-trash"></i>Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach($mensagem as $chat)
            
            @if($chat->id_mensagem==$user_2->id)
            <div class="row m-b-20 received-chat">
                
                <div class="col-auto p-r-0">
                    
                    <img src="{{ $user_2->vc_path }}" alt="user image" class="img-radius wid-40">
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
                    <img src="{{Auth::user()->vc_path}}" alt="user image" class="img-radius wid-40">
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
            
            {{ $mensagem->links() }}
            
            @empty($chat)
            <div style="text-align: center"> 
                <p>
                    Não há mensagens para esta conversa
                </p>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            @endempty
            <form action="{{route('site.chat.store', $user_2->id)}}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="input-group m-t-15">
                    <input type="text" name="mensagem" class="form-control" id="mensagem" placeholder="Escrever mensagem">
                    <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="feather icon-message-circle"></i>
                        </button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection