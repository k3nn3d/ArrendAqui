@extends('layouts.site.index2')
@section('conteudo')



<div class="section" >
    <div class="container">
        <a href="{{ route('back') }}">Voltar</a>
      <div class="row mb-5" >
        
        <div class="col-lg-2">

        </div>
       
        
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
              <center>
              </center>
                <hr>
              
              
                <form action="{{route('user.pedido.store')}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                    <div class="row">
                      
                      <div class="col-12" id="step-1">
                        <center>
                        <h1>Trajeto</h1>
                        </center>
                       
                            <div id="map"></div>
                          
                        <br>
                      </div>
    
                    <div class="col-2"></div>
                    <div class="col-8" id="step-1">
                      <div class="row">

                        <center>
                            <h1>Detalhes da Reserva</h1>
                        </center>
                        <center>
                          <h1 id="preco-h1" style="color:green" >
                            {{$pedido->preco}}Akz
                          </h1>
                          <span>Preço</span>
                          <br>
                          <br>
                          <br>
                          
                        </center>
                       
                       @if(Auth::user()->vc_tipo_utilizador==3)
                       <center>
                            <div>
                                @forEach($users as $user)
                                    @if($user->id == $pedido->id_user )
                                       <img src="{{asset($user->vc_path)}}" alt="" style="width: 80px; heigth:80px; border-radius:50%;">
                                       <br>
                                       <b>Cliente:</b> {{ $user->name}} {{ $user->lastname}}
                                       @if($pedido->id_motorista ==Auth::user()->id)
                                            <b>Teledone:</b> {{ $user->telefone}}
                                       @endif
                                    @endif
                                @endforeach
                            </div>
                            <br>
                            <br>
                        </center>
                       @endif
                       @if(Auth::user()->vc_tipo_utilizador==6) 
                                @if($pedido->id_motorista)
                                    <div>
                                        @forEach($users as $user)
                                        <img src="{{asset($user->vc_path)}}" alt="" style="width: 80px; heigth:80px; border-radius:50%;">
                                        <br>
                                        <b>Motorista:</b> {{ $user->name}} {{ $user->lastname}}
                                        @if($pedido->id_motorista ==Auth::user()->id)
                                             <b>Teledone:</b> {{ $user->telefone}}
                                        @endif
                                           
                                        @endforeach
                                    </div>
                                @endif
                       @endif 
                        <div class="col-12 mb-3">
                          <div class="row">
                          <div class="col-6 mb-3">
                            <label for="">Data</label>
                            <input
                            type="date"
                            class="form-control"
                            name="data"
                            id="data"
                            value="{{$pedido->data}}"
                        
                            readonly
                            />
                            <p id="data_p"></p>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="">Hora</label>
                            <input
                            type="time"
                            class="form-control"
                            name="hora"
                            id="hora"
                            value="{{$pedido->hora}}"
                            readonly
                            />
                        </div> 
                    </div>
                    <div class="row" style="display: none;">
                        <div class="col-6 mb-3">
                            <label for="">Local de Partida</label>
                            <input
                            type="text"
                            class="form-control"
                            name="partida"
                            id="partida"
                            value=""
                            readonly min="0"
                            />
                           
                        </div> 

                        <div class="col-6 mb-3">
                            <label for="">Destino</label>
                            <input
                            type="text"
                            class="form-control"
                            name="destino"
                            id="destino"
                            value=""
                            
                            readonly min="0"
                            />
                           
                        </div>
                        </div>
                       

                        @if($pedido->estado == 'Reservado')
                        @if(Auth::user()->vc_tipo_utilizador==6)
                        <a href="{{ route('user.pagemento.pedido',$pedido->id) }}" class="btn btn-success">Fazer pagamento</a>
                        @endif
                         
                        <a  class="btn btn-danger">Cancelar</a>
                        @endif

                        @if(Auth::user()->vc_tipo_utilizador==3)
                           
                            @if($pedido->estado == 'Pendente')
                            <a href="{{ route('user.pedido.aceitar',$pedido->id) }}" class="btn btn-success">Aceitar</a>
                            <a  class="btn btn-danger">Recusar</a>
                            @endif
                            @if($pedido->estado == 'Recusado')
                            <a  class="btn btn-success">Reserva Recusada</a>
                            @endif
                            @if($pedido->estado == 'Cancelada')
                            <a  class="btn btn-success">Reserva Cancelada</a>
                            @endif
                        @endif    

                        
                    </div>
                    
                       
                    </div>
                    
                   
                    
                   
                 
                   <div class="col-1"></div>
                 </div>
                 </div>
               </div>
               </div>
             </div>
         </div>
       
                
@if(session('igualdade'))

<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Você está tentando cadastrar uma casa já cadastrada.',
  'error'
)
</script>
@endif




{{--
<!-- JavaScript -->
<script>
  // selecione os elementos DOM
  const provinciaSelect = document.getElementById('provincia');
  const municipioSelect = document.getElementById('municipio');

  // atualize a lista de municípios quando a província for alterada
  provinciaSelect.addEventListener('change', () => {
    // obtenha o valor selecionado da província
    const provinciaSelecionada = provinciaSelect.value;

    // faça uma chamada AJAX para obter a lista de municípios correspondentes
    fetch(`/municipios/${provinciaSelecionada}`)
      .then(response => response.json())
      .then(municipios => {
        // limpe a lista de municípios existente
        municipioSelect.innerHTML = '';

        // adicione as opções de município à lista
        if (municipios.length) {
          municipios.forEach(municipio => {
            const option = document.createElement('option');
            option.text = municipio.name;
            option.value = municipio.id;
            municipioSelect.add(option);
          });
        } else {
          // se não houver municípios disponíveis, adicione uma opção vazia
          const option = document.createElement('option');
          option.text = '';
          municipioSelect.add(option);
        }
      });
  });
</script>

--}}
{{--
<script>
  // Selecione os elementos necessários
const steps = document.querySelectorAll('.step');
const nextBtns = document.querySelectorAll('.next');
const nextBtns1 = document.querySelectorAll('.next1');
const prevBtns = document.querySelectorAll('.prev');
let currentStep = 0;

// Função para mostrar a etapa atual
function showStep(stepIndex) {
// Oculte todas as etapas
steps.forEach(step => {
step.style.display = 'none';
});

nextBtns1.forEach(Btns1 => {
  Btns1.style.color = 'grey';
});

nextBtns1[stepIndex].style.color='#198754';

// Mostre a etapa atual
steps[stepIndex].style.display = 'block';
}

// Função para avançar para a próxima etapa
function nextStep() {
if (currentStep < steps.length - 1) {
currentStep++;
showStep(currentStep);
}
}

// Função para voltar para a etapa anterior
function prevStep() {
if (currentStep > 0) {
currentStep--;
showStep(currentStep);
}
}

// Adicione os eventos de clique aos botões
nextBtns.forEach(btn => {
btn.addEventListener('click', nextStep);
});

prevBtns.forEach(btn => {
btn.addEventListener('click', prevStep);
});

// Mostre a primeira etapa inicialmente
showStep(currentStep);

</script>
--}}
{{--OpenStreetmaps
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
END-OpenStreetmaps--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&libraries=places"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&libraries=places"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&libraries=places"></script>
<script>
  var map;

  function initMap() {
    function success(pos) {
    lat = pos.coords.latitude;
    long = pos.coords.longitude;
    var origin = { lat: lat , lng: long };
    //var lat2 = -8.8630933; // Latitude fixa do ponto final
      //var long2 = 13.323073632735849; // Longitude fixa do ponto final


  function error(err) {
    console.log(err);
  }

  var watchID = navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true
  });
  
    // Configurar coordenadas de origem e pontos intermediários

    
    var waypoint1 = { lat: {{ $pedido->latitude }}, lng: {{ $pedido->longitude }} };
    var destination = { lat: {{ $pedido->casa_latitude }}, lng: {{ $pedido->casa_longitude }} };
  


   
    // Inicializar o mapa
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
      center: origin
    });

    // Traçar a rota
    var directionsService = new google.maps.DirectionsService();
    var directionsRenderer = new google.maps.DirectionsRenderer({
      map: map
    });

    var request = {
      origin: origin,
      destination: destination,
      waypoints: [
        { location: waypoint1 },
        
      ],
      travelMode: 'DRIVING'
    };
   
    directionsService.route(request, function(result, status) {
      if (status == 'OK') {
        directionsRenderer.setDirections(result);

        // Obter a rota
        var route = result.routes[0];

        // Criar um marcador para acompanhar o movimento
        var marker = new google.maps.Marker({
          position: route.legs[0].start_location,
          map: map
        });

        // Animar o marcador ao longo da rota
        var step = 0;
        var numSteps = route.legs[0].steps.length;

        setInterval(function() {
          step = (step + 1) % numSteps;
          var nextLocation = route.legs[0].steps[step].end_location;
          marker.setPosition(nextLocation);
        }, 2000);
      }
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDakSjifzNklAYqB0o4zbM2f66mafBoDk&callback=initMap"></script>
@endsection

