@extends('layouts.site.index2')
@section('conteudo')



<div class="section" >
    <div class="container">
        <a href="{{ route('back') }}">Voltar</a>
      <div class="row mb-5" >
        <h2 style="text-align: center" class="mb-5" data-aos="fade-up" data-aos-delay="200">Faça uma reserva</h2>
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
                          <h1 id="preco-h1">
                            0kz
                          </h1>
                          <span>Preço</span>
                        </center>
                          
                            <div class="col-12 mb-3">
                              
                              <input
                              type=""
                              class="form-control"
                              name="preco"
                              id="preco"
                              value="{{ old('preco') }}"
                              readonly
                              required
                              style="display: none" />
                              <input
                              type=""
                              class="form-control"
                              name="casa"
                              id="casa"
                              value="{{ $casa->id }}"
                              readonly
                              required
                              style="display: none" />
                          </div>
                      <br>
                          <div class="col-6 mb-3">
                            <label for="">Data</label>
                            <input
                            type="date"
                            class="form-control"
                            name="data"
                            id="data"
                            value="{{ old('data') }}"
                        
                            required
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
                            value="{{ old('hora') }}"
                            required
                            />
                        </div> 
                        <div class="col-12 mb-3">
                            <label for="">Local de Partida</label>
                            <input
                            type="text"
                            class="form-control"
                            name="partida"
                            id="partida"
                            value="{{ old('partida') }}"
                            placeholder="País, município, rua ou destrito"
                            required min="0"
                            />
                            <br>
                           <button class="btn" type="button" onclick="pegar_minha_localizacao()" id="location"> Pegar minha Localização</button>
                          <p id="errorText" style="color: red;">

                          </p>
                           <input type="text" name="latitude"  id="lat">
                           <input type="text" name="longitude"  id="long">
                        </div> 

                    </div>
                        <button type="submit" class="next btn btn-success">Reservar</button>
                    </div>
                    <script>
                      const form = document.querySelector('form');
                      const dataInput = document.querySelector('#data');
                      let mensagem=document.getElementById('data_p');
                    
                      form.addEventListener('submit', function(event) {
                        const selectedDate = new Date(dataInput.value);
                        const currentDate = new Date();
                    
                        if (selectedDate < currentDate) {
                          event.preventDefault();
                          const currentDateString = currentDate.toLocaleDateString();
                          mensagem.innerHTML = `A data selecionada não pode ser menor que a data atual (${currentDateString}).`;
                          mensagem.style.color='red';
                        }
                      });
                    </script>
                 
                    
                   
                 
                   <div class="col-1"></div>
                 </div>
                 </div>
               </div>
               </div>
             </div>
         </div>
        </form>
                
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

<script>

function pegar_minha_localizacao() {
  let lat;
  let long;
  let lati = document.getElementById('lat');
  let longi = document.getElementById('long');
  let partida = document.getElementById('partida');
  var errorText = document.getElementById('errorText');

  function success(pos) {
    lat = pos.coords.latitude;
    long = pos.coords.longitude;
    lati.value = lat;
    longi.value = long;
    //var lat2 = -8.8630933; // Latitude fixa do ponto final
      //var long2 = 13.323073632735849; // Longitude fixa do ponto final

      calculateAndDisplayRoute(lat,long, {{$casa->latitude}}, {{ $casa->longitude }});
    var geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, long);
    var address = '';

    geocoder.geocode({ 'latLng': latlng }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          address = results[0].formatted_address;
          partida.value = address;
          errorText.textContent = ""; // Limpa a mensagem de erro
        } else {
          console.log('Endereço não encontrado.');
        }
      } else {
        console.log('Erro ao obter o endereço:', status);
      }
    });
  }

  function error(err) {
    console.log(err);
  }

  var watchID = navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true
  });
  //navigator.geolocation.clearWatch(watchID); // Para o acompanhamento anterior
}



//PEGAR LOCALIZAÇÃO AO ESCREVER
var typingTimer;
var doneTypingInterval = 500; // Intervalo em milissegundos após o usuário terminar de digitar
let lati = document.getElementById('lat');
let longi = document.getElementById('long');
var addressInput = document.getElementById('partida');
var errorText = document.getElementById('errorText');
var searchButton = document.getElementById('location');

// Função para inicializar o serviço de Geocodificação do Google Maps
function initializeGeocoder() {
  geocoder = new google.maps.Geocoder();
}

// Chamada da função de inicialização do Geocodificador
google.maps.event.addDomListener(window, 'load', initializeGeocoder);

addressInput.addEventListener('input', function() {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(getCoordinates, doneTypingInterval);
});

function getCoordinates() {
  var address = addressInput.value;

  // Criação de um objeto GeocoderRequest
  var geocoderRequest = {
    address: address
  };

  // Chamada da função geocode do Geocoder do Google Maps
  geocoder.geocode(geocoderRequest, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK && results.length > 0) {
      var latitude = results[0].geometry.location.lat();
      var longitude = results[0].geometry.location.lng();
      lati.value = latitude;
      longi.value = longitude;
      var lat2 = -8.8630933; // Latitude fixa do ponto final
      var long2 = 13.323073632735849; // Longitude fixa do ponto final

      calculateAndDisplayRoute(latitude,longitude, {{ $casa->latitude }}, {{ $casa->longitude }});
      errorText.textContent = ""; // Limpa a mensagem de erro
    } else {
      console.log('Endereço inválido. Por favor, insira um endereço válido.');
      lati.value = '';
      longi.value = '';
      errorText.textContent = "Por favor, insira um endereço válido.";
    }
  });
}


//TRAÇAR ROTAS
  var map;
  var directionsService;
  var directionsDisplay;
  var originMarker;
  var destinationMarker;
  var carMarker;
  let preco =document.getElementById('preco');
  let preco_h1 =document.getElementById('preco-h1');
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 0, lng: 0},
      zoom: 14
    });

    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);

    var userIcon = {
      url: '{{asset("imagens/mapa/cars.png")}}', // Substitua pelo caminho para o ícone de usuário
      scaledSize: new google.maps.Size(40, 40)
    };

    var homeIcon = {
      url: '{{asset("imagens/mapa/casa.png")}}', // Substitua pelo caminho para o ícone de casa
      scaledSize: new google.maps.Size(40, 40)
    };

    var carIcon = {
      url: '{{asset("imagens/mapa/car.png")}}', // Substitua pelo caminho para o ícone de carro
      scaledSize: new google.maps.Size(40, 40)
    };

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var lat1 = position.coords.latitude;
        var long1 = position.coords.longitude;

        originMarker = new google.maps.Marker({
          position: {lat: lat1, lng: long1},
          map: map,
          icon: userIcon
        });

      
        destinationMarker = new google.maps.Marker({
          position: {lat: lat2, lng: long2},
          map: map,
          icon: homeIcon
        });

        

        // Adiciona o marcador de carro inicialmente escondido
        carMarker = new google.maps.Marker({
          position: {lat: lat1, lng: long1},
          map: map,
          icon: carIcon,
          visible: false
        });

        setInterval(function () {
          updateMarkerPosition(lat1, long1);
        }, 1000); // Atualiza a posição do marcador a cada 1 segundo
      }, function (error) {
        console.log(error);
      }, {enableHighAccuracy: true});
    } else {
      console.log('Geolocation is not supported by this browser.');
    }
  }

  function calculateAndDisplayRoute(lat1, long1, lat2, long2) {
    var request = {
      origin: new google.maps.LatLng(lat1, long1),
      destination: new google.maps.LatLng(lat2, long2),
      travelMode: google.maps.TravelMode.DRIVING
    };

    directionsService.route(request, function (result, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
        var route = result.routes[0];
        var distance = 0;

        for (var i = 0; i < route.legs.length; i++) {
          distance += route.legs[i].distance.value;
          preco.value= distance * 30;
          preco_h1.innerHTML= distance * 30+'kz';
          preco_h1.style.color= 'green'; 

        }

        console.log('Distance:', distance + ' meters');
      } else {
        console.log('Directions request failed. Status:', status);
      }
    });
  }

  function updateMarkerPosition(lat1, long1) {
    originMarker.setPosition(new google.maps.LatLng(lat1, long1));
    carMarker.setPosition(new google.maps.LatLng(lat1, long1));
    carMarker.setVisible(true);
  }

  initMap();
</script>
@endsection

