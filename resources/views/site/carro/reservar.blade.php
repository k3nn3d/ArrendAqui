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
               
              <button class="next1 btn">Reserva</button>  <button class="next1 btn" >Trajetória</button>  
              
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
                    <button type="button" class="next btn btn-success">Próximo</button>
                   
                  </div>
                  <div class="step" id="step-1">
                    <h1>Trajetória</h1>
                   
                        <div id="map"></div>
                      
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button type="submit" class="next btn btn-success">Fazer reserva</button>
                   
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




{{--OpenStreetmaps--}}
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script>
  var map = L.map('map').setView([0, 0], 13); // Coordenadas iniciais

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  var lat1;
  var long1;
  var lat2 = -8.8630933; // Latitude fixa do ponto final
  var long2 = 13.323073632735849; // Longitude fixa do ponto final

  // Ícone de usuário
  var userIcon = L.icon({
    iconUrl: 'user-icon.png', // Substitua pelo caminho do ícone de usuário
    iconSize: [32, 32]
  });

  // Ícone de casa
  var homeIcon = L.icon({
    iconUrl: 'home-icon.png', // Substitua pelo caminho do ícone de casa
    iconSize: [32, 32]
  });

  // Ícone de carro
  var carIcon = L.icon({
    iconUrl: 'car-icon.png', // Substitua pelo caminho do ícone de carro
    iconSize: [32, 32]
  });

  function success(pos) {
    lat1 = pos.coords.latitude;
    long1 = pos.coords.longitude;

    var control = L.Routing.control({
      waypoints: [
        L.latLng(lat1, long1), // Coordenadas de origem (posição atual do usuário)
        L.latLng(lat2, long2) // Coordenadas de destino (ponto final fixo)
      ],
      routeWhileDragging: true
    }).addTo(map);

    var marker1 = L.marker([lat1, long1], { icon: userIcon }).addTo(map);
    var marker2 = L.marker([lat2, long2], { icon: homeIcon }).addTo(map);

    function updateMarkerPosition() {
      marker1.setLatLng([lat1, long1]);
      control.spliceWaypoints(0, 1, L.latLng(lat1, long1));
      marker1.setIcon(carIcon); // Altera o ícone para o ícone de carro
    }

    setInterval(updateMarkerPosition, 1000); // Atualiza a posição do marcador a cada 1 segundo
  }

  function error(err) {
    console.log(err);
  }

  navigator.geolocation.getCurrentPosition(success, error, {
    enableHighAccuracy: true
  });
</script>
@endsection

