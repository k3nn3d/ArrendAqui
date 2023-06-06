@extends('layouts.site.index2')
@section('conteudo')



<div class="section" >
    <div class="container">
        <a href="{{ route('back') }}">Voltar</a>
      <div class="row mb-5" >
        <h2 style="text-align: center" class="mb-5" data-aos="fade-up" data-aos-delay="200">Faça uma reserva</h2>
        <div class="col-lg-2">

        </div>
       
        
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <center>
              <div style="display:flex;" class="mb-4"> 
               
              <button class="next1 btn">Reserva</button>  <button class="next1 btn" >Encontrar carro</button>   <button class="next1 btn" >Finalizar</button>  
              
                </div>
              </center>
                <hr>
              
              
                <form action="{{route('user.casa.store')}}" method="POST" enctype="multipart/form-data" style="box-shadow: 2px 2px 2px 2px  rgba(0, 0, 0, 0.055); padding:2rem;">
                  @csrf
                    <div class="row">
                      
                    
                    <div class="step" id="step-1">
                      <div class="row">

                      <h1>Detalhes da Reserva</h1>
                                                 
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
                           <button class="btn" type="button" onclick="pegar_minha_localizacao()" id="location"> Pegar minha Localização</button>
                          <p id="errorText" style="color: red;">

                          </p>
                           <input type="text" name="lat"  id="lat">
                           <input type="text" name="long"  id="long">
                        </div> 

                    </div>
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button type="button" class="next btn btn-success">Fazer reserva</button>
                   
                  </div>
                  <div class="step" id="step-1">
                    <h1>Encontrar carro</h1>
                   
                        <div id="map" style="width: 100%; height: 600px;"></div>
                      
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button type="button" class="next btn btn-success">Próximo</button>
                   
                  </div>

                  <div class="step" id="step-1">
                    <div class="row">
                      <h1>Escolha um plano</h1>
                      <div class="col-lg-4 mb-3">   
                        <input type="radio" class="plano" id="plano1" name="plano" value="free" placeholder="Plano">
                        <label for="plano1">
                          <div class="btn btn-success">
                            <h4 style="text-align: center">Free</h4>
                            <hr>
                            <div>
                              <h5>1 semana</h5>
                               
                              <ul>
                                <li></li>
                              </ul>
                              <hr>
                              <p>Preço: 00.00kz</p>
                            </div>
                          </div>
                      </label>
                      </div>
                      <div class="col-lg-4 mb-3">
                        <input type="radio" class="plano" id="plano2" name="plano" value="2" placeholder="Plano">
                        <label for="plano2">
                          <div class="btn btn-warning" >
                            <h4 style="text-align: center">Fácil</h4>
                            <hr>
                            <div>
                              <h5>2 meses</h5>
                               
                              <ul>
                                <li></li>
                              </ul>
                              <hr>
                              <p>Preço: 1.000kz</p>
                            </div>
                          </div>
                      </label>
                      </div>
                      <div class="col-lg-4 mb-3">
                        <input type="radio" id="plano3" class="plano" name="plano" value="3" placeholder="Plano">
                        <label for="plano3">
                          <div class="btn btn-primary" for="plano3" style="">
                            <h4 style="text-align: center">Prático</h4>
                            <hr>
                            <div>
                              
                                <h5>3 meses</h5>
                              
                                <ul>
                                  <li></li>
                                </ul>
                                <hr>
                              <p>Preço: 1.800kz</p>
                            </div>
                          </div>
                      </label>
                      </div>
                    

                    </div>
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button type="button" class="next btn btn-success">Próximo</button>
                   
                  </div>

                  <div class="step" id="step-1">
                    
                      <h1>Pagamento</h1>

                      <div class="free" style="height: 100px; display: none;">
                        <h3>Seu plano é gratuito!</h3>

                      </div>
                      <div class="escolha" style="height: 100px">
                        <h3>Escolha um plano!</h3>

                      </div>
                      <div class="row pagamento" style="display: none;" >
                        <div class="col-12 mb-3">
                          <label for="">IBAN</label>
                          <input
                          type="text"
                          name="i"
                          id="i"
                          class="form-control"
                          value="A060002229449848322909"
                          readonly
                          required
                          />
                      </div>
                      <div class="col-12 mb-3">
                        <label for="">Titular</label>
                        <input
                        type="text"
                        name="t"
                        id="t"
                        class="form-control"
                        value="Administrador do Sistema"
                        required
                        readonly
                        />
                    </div>
                    <div class="col-12 mb-3">
                      <label for="">Valor a transferir</label>
                      <input
                      type="text"
                      name="v"
                      id="v"
                      class="form-control"
                      value=""
                      readonly
                    
                      />
                  </div>
                    <div class="col-12 mb-3">
                      <label for="">Comprovativo</label>
                      <input
                      type="file"
                      name="comprovativo"
                      id="c"
                      class="form-control"
                      value=""
                      required
                      
                      />
                  </div>
  

                    </div>
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button class="btn btn-success" id="botao" disabled>Cadastrar casa</button>
                   
                  </div>
                        
                    </div>
                  
                  </div>
                  <div class="col-lg-2">
                   {{-- <img src="imagens/casa2.jpg" style="height: 60vh; width:56vh" alt="item image">--}}
                  </div>
                 </div>
                  
                   
                 
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




<script>
const inputFile = document.getElementById('vc_path');
const imagePreview = document.getElementById('image-preview');

inputFile.addEventListener('change', () => {
  const file = inputFile.files[0];
  const url = URL.createObjectURL(file);

  // código para exibir a imagem
  imagePreview.src = url;
});

URL.revokeObjectURL(url);
</script>


<script>
  const planos = document.querySelectorAll('.plano');
  const valor =document.getElementById('v')
  const pagamentos = document.querySelectorAll('.pagamento');
  const frees = document.querySelectorAll('.free'); 
  const escolhas = document.querySelectorAll('.escolha'); 
  const botao = document.getElementById('botao')
  const comprovativo = document.getElementById('c')

  
    planos.forEach(plano=>{
      if(plano.value == 'free'){
        plano.addEventListener('click',()=>{
          pagamentos.forEach(pagamento=>{
            pagamento.style.display='none';

          });
          frees.forEach(free=>{
            free.style.display='block';

          });
          escolhas.forEach(escolha=>{
            escolha.style.display='none';

          });
          botao.disabled= false;
          comprovativo.required=false;
        });
 
    }
    if(plano.value == '2'){
      plano.addEventListener('click',()=>{
        pagamentos.forEach(pagamento=>{
            pagamento.style.display='block';

          });
          frees.forEach(free=>{
            free.style.display='none';

          });
          escolhas.forEach(escolha=>{
            escolha.style.display='none';

          });
        botao.disabled= false;
        comprovativo.required=true;
        valor.value='1.000 kzs'
               
    });
    }
    if(plano.value == '3'){
      plano.addEventListener('click',()=>{
        pagamentos.forEach(pagamento=>{
            pagamento.style.display='block';

          });
          frees.forEach(free=>{
            free.style.display='none';

          });
          escolhas.forEach(escolha=>{
            escolha.style.display='none';

          });
        botao.disabled= false;  
        comprovativo.required=true;
        valor.value='1.800 kzs'
    })
  }
    });
    


</script>



<script>
  let counter = 1;
  function addDuplicateElement() {
   
    // Obtém o elemento pai
    const parentElement = document.getElementById('vc_path').parentNode;
  
    // Cria uma cópia do elemento pai e seus filhos
    const duplicateElement = parentElement.cloneNode(true);
     // Gera um novo nome único para o elemento duplicado
     const newName = `vc_path[${counter}]`;
//alert(newName);
     counter += 1;

// Atualiza o atributo "name" do elemento duplicado
duplicateElement.querySelector('input').setAttribute('name', newName);

// Incrementa o contador para gerar um novo nome único para a próxima duplicação
counter++;
    // Adiciona uma classe ao novo elemento para exibi-lo horizontalmente
    duplicateElement.classList.add('duplicate-element');
  
    // Adiciona a cópia como um novo elemento no DOM
    parentElement.parentNode.insertBefore(duplicateElement, parentElement.nextSibling);
  }
  </script>



<script>

 function pegar_minha_localizacao(){ 
  let lat;
  let long;
  let lati = document.getElementById('lat');
  let longi = document.getElementById('long');
  let partida = document.getElementById('partida');
  var errorText = document.getElementById('errorText');

  
  function success(pos){
      lat=pos.coords.latitude;
      long=pos.coords.longitude;
      lati.value=lat;
      longi.value=long;  
      //let  zoom= 12;
    var url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" + lat + "&lon=" + long;//+ "&zoom=" + zoom;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        var municipality = data.address.city || data.address.town || data.address.village || data.address.hamlet;
        var street = data.address.road || data.address.pedestrian || data.address.pedestrian_area;
        var province = data.address.state;
        var address = "";
        if (street) {
          address += street + ", ";
        }
        if (municipality) {
          address += municipality + ", ";
        }
        if (province) {
          address += province + ", ";
        }
        address += data.address.country;
        //console.log('Endereço:', address);
        partida.value =  address;
        errorText.textContent = ""; // Limpa a mensagem de erro
      })
      .catch(error => {
        console.log('Erro ao obter o endereço:', error);
      });
  }
  
  
  function error(err){
      console.log(err);
  }
 
  var wacthID = navigator.geolocation.getCurrentPosition(success,error,{
      enableHighAccuracy: true
  });
    //navigator.geolocation.clearWatch(watchID); // Para o acompanhamento anterior
}
  
</script>



<script>


var typingTimer;
var doneTypingInterval = 500; // Intervalo em milissegundos após o usuário terminar de digitar
let lati = document.getElementById('lat');
let longi = document.getElementById('long');
var addressInput = document.getElementById('partida');
var errorText = document.getElementById('errorText');

var searchButton = document.getElementById('location');

addressInput.addEventListener('input', function() {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(getCoordinates, doneTypingInterval);
});


function getCoordinates() {
  var address = addressInput.value;
  var url = "https://nominatim.openstreetmap.org/search?format=json&q=" + encodeURIComponent(address);

  fetch(url)
    .then(response => response.json())
    .then(data => {
      if (data.length > 0) {
        var latitude = data[0].lat;
        var longitude = data[0].lon;
        //console.log('Latitude:', latitude);
        //console.log('Longitude:', longitude);
        lati.value = latitude;
        longi.value= longitude;
        errorText.textContent = ""; // Limpa a mensagem de erro
      } else {
        console.log('Endereço inválido. Por favor, insira um endereço válido.');
        lati.value = '';
        longi.value= '';
        errorText.textContent = "Por favor, insira um endereço válido.";
      }
    })
    .catch(error => {
      console.log('Erro ao obter as coordenadas:', error);
      lati.value = '';
      longi.value= '';
      errorText.textContent = "Erro ao obter as coordenadas.";
    });
}

</script>





{{--OpenStreetmaps--}}
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script >


  let lat;
  let long;
    
    function success(pos){
    
        lat=pos.coords.latitude;
        long=pos.coords.longitude;
        var map = L.map('map').setView([lat, long], 13); // Substitua latitude e longitude pelas coordenadas iniciais desejadas
  
  // Adiciona o layer do OpenStreetMap ao mapa
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
  }).addTo(map);
  
  // Adiciona um marcador na localização atual
  L.marker([lat,long]).addTo(map)
      .bindPopup('Você está aqui!')
      .openPopup();

      L.marker([-8.8630933,13.323073632735849]).addTo(map)
      .bindPopup('Outro ponto')
      .openPopup();
  
  
        
    
    }
   
    
    
    function error(err){
        console.log(err);
    }
  
    var wacthID=navigator.geolocation.watchPosition(success,error,{
        enableHighAccuracy: true
    });
   
    
          // Cria o mapa e define a visualização inicial
</script>
@endsection

