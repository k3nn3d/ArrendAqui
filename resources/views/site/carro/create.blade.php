
@extends('layouts.site.index')
@section('conteudo')
<!--HEADER START-->
<div
class="hero page-inner overlay"
style="background-image: url('tamplate/images/hero_bg_1.jpg')"
>

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">Publicar carro</h1>

      <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li
            class="breadcrumb-item active text-white-50"
            aria-current="page"
          >
          Publicar carro
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>

<!--HEADER END-->

<div class="section">
    <div class="container">
      <div class="row mb-5">
        <h2 style="text-align: center" class="mb-5" data-aos="fade-up" data-aos-delay="200">Cadastre um carro</h2>
        <div class="col-lg-3">

        </div>
       
        
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div style="display:flex;" class="mb-4"> 
                <button class="next1 btn" >Imagens</button>    <button class="next1 btn">Descrição</button>  <button class="next1 btn" >Localização</button>    <button class="next1 btn">Documentos</button>
                </div>
                
              
              
                <form action="{{route('user.carro.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                      <div class="step" id="step-1">
                        <h1>Images</h1>
                        <div class="row">
                        <div class="col-12 mb-3">
                          <label for="vc_path" onclick="addDuplicateElement()">
                            Adicionar
                          <br>
                          <div  style="width: 120px;cursor:pointer;padding:5px; height:120px; border-radius:20px; border:5px solid gray;" >
                            <img  alt="" src="imagens/camera.png"  style="width: 100%; height:100%;" id="image-preview">
                          </div>
                         </label>
                          <input
                          type="file"
                          name="vc_path[]"
                          id="vc_path"
                          class="form-control"
                          value="{{ old('vc_path') }}"
                          style="display: none"
                          />
                      </div>
                    </div>
                    
                      <button type="button" class="next btn btn-success">Próximo</button>
                      
                    </div>
                    <div class="step" id="step-1">
                      <h1>Descricão</h1>
                      <div class="row">
                        <div class="col-6 mb-3">
                          <label for="">Marca</label>
                            <input
                            type="text"
                            class="form-control"
                            name="marca"
                            id="marca"
                            value="{{ old('marca') }}"
                            placeholder="Marca"
                            required min="0"
                            />
                        </div>
                     
                          <div class="col-6 mb-3">
                            <label for="">Modelo</label>
                              <input
                              type="text"
                              class="form-control"
                              name="modelo"
                              id="modelo"
                              value="{{ old('modelo') }}"
                              placeholder="Modelo"
                              required min="0"
                              />
                          </div>
                        <div class="col-12 mb-3">
                          <label for="">Categoria</label>
                          <select class="form-control" name="id_categoria" id="">
                            <option style="align-content: center" value="">Categoria</option>
                            <option style="align-content: center" value="">Pesado</option>
                            <option style="align-content: center" value="">Ligeiro</option>
                          </select>
                        </div>
                       
                        <div class="col-12 mb-3">
                          <label for="">Lugares</label>
                          <input
                          type="number"
                          class="form-control"
                          name="lugares"
                          id="lugares"
                          value="{{ old('lugares') }}"
                          placeholder="Lugares"
                          required min="0"
                          />
                      </div>
                       

                      </div>
                      <button type="button" class="prev btn btn-primary">Anterior</button>
                      <button type="button" class="next btn btn-success">Próximo</button>
                     
                    </div>

                    <div class="step" id="step-1">
                      <div class="row">

                      <h1>Localização</h1>
                        <div class="col-6 mb-3">
                          <label for="">Província</label>
                          <select class="form-control" name="provincia" id="provincia">
                            <option style="align-content: center" value="">Provincia</option>
                            @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }} {{ old('provincia')==$provincia->id? 'selected':'' }}">{{ $provincia->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="">Município</label>
                          <select class="form-control" name="municipio" id="municipio">
                            <option style="align-content: center" value="">Município</option>
                             @foreach($municipios as $municipio)
                          
                             <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
                           
                             @endforeach
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                          Bairro
                          <input
                          type="text"
                          class="form-control"
                          name="bairro"
                          id="bairro"
                          value="{{ old('bairro') }}"
                          placeholder="Bairro"
                          required
                          />
                      </div>
                      <div class="col-12 mb-3">
                        <label for="">Rua</label>
                          <input
                          type="text"
                          class="form-control"
                          name="bairro"
                          id="bairro"
                          value="{{ old('rua') }}"
                          placeholder="Rua"
                          required 
                          />
                      </div>

                    </div>
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button type="button" class="next btn btn-success">Próximo</button>
                   
                  </div>
                  <div class="step" id="step-1">
                    <h1>Documentos</h1>
                    <div class="row">
                      
                    <div class="col-12 mb-3">
                      <label for="">Propriedade</label>
                      <input
                      type="file"
                      name="propriedade"
                      id="propriedade"
                      class="form-control"
                      value="{{ old('propriedade') }}"
                      required
                      />
                  </div>

                    </div>
                    <button type="button" class="prev btn btn-primary">Anterior</button>
                    <button type="submit" class="next btn btn-success">Cadastrar</button>
                   
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
@endsection