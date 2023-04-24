@extends('layouts.perfil.index')
@section('conteudo')
<div class="pcoded-main-container" >
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



  {{-- Cadastrar user --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$casa->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div>
                <span style="font-size: 2rem; font-weight:600;padding:1rem">  Você vai arrendar esta casa?</span>
            </div>
            <div style="width:900px; padding:1.5rem ">
            <img src="{{$casa->vc_path}}" alt="casa-image" style="width:100%" >
            </div>
            <div style="padding-left:2rem; width:500px">
                <p>Quartos:{{$casa->quartos}}</p>
                <hr>
                <p>Cozinha:{{$casa->cozinha}}</p>
                <hr>
                <p>Sala:{{$casa->sala}}</p>
                <hr>
                <p></p>
                <hr>
                <p></p>
                <hr>
                <p></p>

                <!--Google maps-->
                <div style="width: 100%; height:300px">
                    <div id="map"></div>
                </div>
                <!--Google maps end-->
            </div>
           
            <div class="modal-body">
               
                <form action="{{route('user.aluguel.store',$casa->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Não</button>
                        <button  class="btn  btn-primary" id="ajaxSubmit" >Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>



  
    
  <script type="module">

    let lat;
    let long;
    
    function success(pos){
        lat=pos.coords.latitude;
        long=pos.coords.longitude;
    
    }
    
    
    function error(err){
        console.log(err);
    }
    var wacthID=navigator.geolocation.watchPosition(success,error,{
        enableHighAccuracy: true
    });
    
    let map;
    
    async function initMap() {
        //@ts-ignore
        const { Map } = await google.maps.importLibrary("maps");
    
        map = new Map(document.getElementById("map"), {
        center: { lat: {{$casa->latitude}}, lng: {{$casa->longitude}} },
        zoom: 14,
        });
      //  alert({{$casa->latitude}}+'|====|'+{{$casa->longitude}})
        function AddMarker(lat,long,icon,content,click){
            var lating={'lat':lat,'lng':long}
            var long={'lat':-23.204780,'lng':-45.904020}
            var marker= new google.maps.Marker({
                position: lating,
                map: map,
                icon: icon
        
            });
            var infoWindow= new google.maps.InfoWindow({
                content: content,
                maxWidth:200,
                pixelOffset: new google.maps.Size(0,20)
            });
            google.maps.event.addListener(marker,'click', function(){
                infoWindow.open(map,marker);
        
            });
        }
        var conteudo='<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black">Você está aqui</p>'
        
        AddMarker(lat,long,'',conteudo,true);
        
        //convertendo objecto php em objecto JS
        var casas = JSON.parse('{!! json_encode($casas) !!}');
        //Percorrendo do valores do objecto convertido
        
        casas.forEach( function(casa) {
         
          var conteudo2 = '<p style="color:black; font-size:13px; padding:10px; border-bottom:1px solid black">' + casa.provincia + ', ' + casa.municipio + ', ' + casa.rua + '</p>';
          //console.log('Nome: '+conteudo2);
         AddMarker(casa.latitude,casa.longitude,'imagens/mapa/casa.png',conteudo2,true);
      });
     
       
    }
    
    
    initMap();
  
   
    
    </script>

@endsection