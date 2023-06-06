@extends('layouts.site.index')
@section('conteudo')
 <!--================Single Product Area =================-->
 <div
      class="hero page-inner overlay"
      style="background-image: url('{{ $casa1->vc_path }}')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
              {{$casa1->municipio}}, {{$casa1->provincia}}
            </h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">
                  <a href="{{route('casas')}}">Casas</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                {{$casa1->municipio}}, {{$casa1->provincia}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide" >
                <img style="height: 600px;" src="{{$casa1->vc_path}}" alt="Image" class="img-fluid" />
                <img style="height: 600px;" src="{{$casa1->vc_path}}" alt="Image" class="img-fluid" />
                <img style="height: 600px;" src="{{$casa1->vc_path}}" alt="Image" class="img-fluid" />
              </div>
            </div>
<!--Google maps-->
<div style="width: 100%; height:600px">
  <div id="map"></div>
</div>
<!--Google maps end-->
          </div>
          
          <div class="col-lg-4">
            <h2 class="heading text-primary">{{$casa1->municipio}}, {{$casa1->provincia}}, {{$casa1->bairro}}</h2>
            <p class="meta"> {{$casa1->cat_name}} </p>
            <hr style="color:green">
            <h5>Preço</h5>
            <p class="text-black-50">
              {{$casa1->preco}}kz/{{$casa1->unidade_name}}
                  </p>
                  <hr>
           
            <h5>Quartos</h5>
            
            <p class="text-black-50">
              {{$casa1->quartos}}
            </p>
            <hr>
            <h5>Casa de banho</h5>
            
            <p class="text-black-50">
              {{$casa1->casa_de_banho}}
            </p>
            <hr>
            <h5>Cozinha</h5>
            
            <p class="text-black-50">
              {{$casa1->cozinha}}
            </p>
            <hr>
            <h5>Sala</h5>
            
            <p class="text-black-50">
              {{$casa1->sala}}
            </p>
            <hr>
            <h5>Descrição</h5>
            
            <p class="text-black-50">
				      {{$casa1->descricao}}
            </p>
            
           
             @if($casa1->plano=='free')


             @else
             
            <div class="d-block agent-box p-5">
              <div class="img mb-4">
                <img
                  src="{{ $casa1->foto_user }}"
                  alt="Image"
                  class="img-fluid"
                />
              </div>
              <div class="text">
                <h3 class="mb-0"> {{$casa1->name_user}} {{$casa1->lastname_user}}</h3>
                <div class="meta mb-3">Senhorio(a)</div>
                <p>
                  {{$casa1->biografia_user}}
                </p>
               
             <ul class="list-unstyled  dark-hover d-flex">
                 
                
				 <li>
          @auth
          @if($casa1->id_user == Auth::user()->id)
          <a href="{{route('user.user.perfil',Auth::user()->id)}}" class="btn btn-primary text-white py-3 px-4"><i class="icon-massage"></i>Perfil</a>
          @else
          
          @foreach($aluguels as $alu)
          @if($alu->id_user==Auth::user()->id && $alu->id_casa== $casa1->id )
          <a
          href="{{ route('user.aluguel.delete',$alu->id) }}"
          class="btn btn-danger py-2 px-3"
          >Cancelar reserva</a
        >
         @endif

        @endforeach
        @empty($alu)
        <a
          href="{{ route('user.aluguel.store',$casa1->id) }}"
          class="btn btn-success py-2 px-3"
          >Reservar</a
        >
        @endempty
       
          
          @endif
          @else
        

          <a
          href="{{ route('login') }}"
          class="btn btn-danger py-2 px-3"
          >Faça login para reservar esta casa</a
        >
          @endauth
				 </li>

                </ul>
              </div>
            </div>
          </div>
          @endif

        </div>
      </div>
    </div>

    

    <div class="section">
      <div class="container">
        <hr> 
        <div class="row mb-5 align-items-center" style="margin-top: 50px">
          <div class="col-lg-12">
            <h2 class="font-weight-bold text-primary heading" style="text-align: center">
              Imóveis relacionados
            </h2>
          </div>
         
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                 @foreach ($casas_destaque as $casa)
                     
                 
                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="{{$casa->vc_path}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                  </a>
    
                  <div class="property-content">
                    <div class="price mb-2"><span>{{$casa->preco}}kz/{{$casa->unidade_name}}</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >{{$casa->user_name}} {{$casa->lastname_user}} </span
                      >
                      <span class="city d-block mb-3">{{$casa->provincia}}, {{$casa->municipio}}, {{$casa1->bairro}} </span>
    
                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">{{$casa->quartos}} quarto(s)</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption"> {{$casa->casa_de_banho}} casa(s) de banho</span>
                        </span>
                      </div>
    
    
                      <a
                        href="{{route('casa.show', $casa->id)}}"
                        class="btn btn-primary py-2 px-3"
                        >Ver detalhes</a
                      >
                    </div>
                  </div>
                </div>
                @endforeach
                <!-- .item -->
    
                              
              </div>
              @empty($casa)
              <p style="text-align: center">Sem imóveis em Destaque</p>
              @endempty
              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Anterior</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Próximo</span
                >
              </div>
            </div>
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
          center: { lat: {{$casa1->latitude}}, lng: {{$casa1->longitude}} },
          zoom: 14,
          });
        //  alert({{$casa1->latitude}}+'|====|'+{{$casa1->longitude}})
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
    
    @if(session('reservado'))

    <script type="text/javascript">
      
      Swal.fire(
      'SUCESSO',
      'Casa reservada com sucesso. Você será notificado caso o senhorio confirme sua reserva',
      'success'
    )
    </script>
    @endif   
@endsection
