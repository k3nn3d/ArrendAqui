@extends('layouts.site.index')
@section('conteudo')
<!--HEADER START-->
<div
class="hero page-inner overlay"
style="background-image: url('{{asset('tamplate/images/hero_bg_1.jpg')}}')"
>

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">Publicar imóvel</h1>

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
          Publicar imóvel
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
        <h2 style="text-align: center" class="mb-5" data-aos="fade-up" data-aos-delay="200">Cadastre um imóvel</h2>
        <div class="col-lg-3">

        </div>
       
        
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div style="display:flex;" class="mb-4"> 
                <button class="next1 btn" >Imagens</button>    <button class="next1 btn">Descrição</button>  <button class="next1 btn" >Localização</button>    <button class="next1 btn">Documentos</button> <button class="next1 btn" >Plano</button>  <button class="next1 btn" >Pagamento</button>  
                </div>
                
              
              
                <form action="{{route('user.casa.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                      <div class="step" id="step-1">
                        <h1>Images</h1>
                        <div class="row">
                        <div class="col-3 mb-3" >
                          <label for="vc_path" onclick="addDuplicateElement()" >
                    
                          <br>
                          <div  style="width: 120px;cursor:pointer;padding:5px; height:120px; border-radius:20px; border:5px solid gray;" >
                            <img  alt="" src="{{asset('imagens/camera.png')}}"  style="width: 100%; height:100%;" id="image-preview">
                          </div>
                         </label>
                          <input
                          type="file"
                          name="vc_path[]"
                          id="vc_path"
                          class="form-control"
                          value="{{ old('vc_path') }}"
                          required
                          style="display: none"
                          />
                      </div>
                    </div>
                    
                      <button type="button" class="next btn btn-success">Próximo</button>
                      
                    </div>
                    <div class="step" id="step-1">
                      <h1>Descricão</h1>
                      <div class="row">
                        <div class="col-8 mb-3">
                          <label for="">Preço da Renda</label>
                            <input
                            type="number"
                            class="form-control"
                            name="preco"
                            id="preco"
                            value="{{ old('preco') }}"
                            placeholder="Preço da Renda"
                            required min="0"
                            />
                        </div>
                        <div class="col-4 mb-3">
                          <label for="">Frequêcia</label>
                          <select class="form-control" name="id_unidade" id="id_unidade">
                            @foreach ($unidades as $unidade)
                            <option style="align-content: center" value="{{ $unidade->id }} {{ old('id_unidade')==$unidade->id? 'selected' :'' }}">/{{$unidade->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                          <label for="">Categoria</label>
                          <select class="form-control" name="id_categoria" id="">
                            <option style="align-content: center" value="">Categoria</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}} {{ old('id_categoria')==$categoria->id? 'selected':'' }}">{{ $categoria->name }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                          Subcategoria
                          <select class="form-control" name="id_sub_categoria" id="">
                            <option style="align-content: center" value="">Subcategoria</option>
                            @foreach($sub_categorias as $sub)
                            <option value="{{ $sub->id }} {{ old('id_sub_categotia')==$sub->id? 'selected':'' }}">{{$sub->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="">Quartos</label>
                          <input
                          type="number"
                          class="form-control"
                          name="quartos"
                          id="quartos"
                          value="{{ old('quartos') }}"
                          placeholder="Quartos"
                          required min="0"
                          />
                      </div>
                      <div class="col-6 mb-3">
                        <label for="">Casas de banho</label>
                        <input
                        type="number"
                        class="form-control"
                        name="casa_de_banho"
                        id="casa_de_banho"
                        value="{{ old('casa_de_banho') }}"
                        placeholder="Casas de banho"
                        required min="0"
                        />
                    </div>
                    <div class="col-6 mb-3">
                      <label for="">Cozinhas</label>
                      <input
                      type="number"
                      class="form-control"
                      name="cozinha"
                      id="cozinha"
                      value="{{ old('cozinha') }}"
                      placeholder="Cozinhas"
                      required min="0"
                      />
                  </div>
                        <div class="col-6 mb-3">
                          <label for="">Salas</label>
                            <input
                            type="number"
                            name="sala"
                            id="sala"
                            class="form-control"
                            value="{{ old('sala') }}"
                            placeholder="Salas"
                            required min="0"
                            />
                        </div>
                        
                        <div class="col-12 mb-3">
                          <label for="">Detalhes</label>
                            <textarea
                            name="descricao"
                            id="descricao   "
                            cols="30"
                            rows="7"
                            class="form-control"
                            style="text-align: start"
                            placeholder=""
                            required
                           
                            >
@if(old('descricao')!= '')
{{ old('descricao') }}
@else
Detalhes
@endif                         
                        </textarea>
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
                            <option value="{{ $provincia->id }} {{ old('provincia')==$provincia->id? 'selected':'' }} {{ $provincia->id == 'selected'? $filtro_municipio=$provincia->id : false }}">{{ $provincia->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-6 mb-3">
                          <label for="">Município</label>
                          <select class="form-control" name="municipio" id="municipio">
                            <option style="align-content: center" value="">Município</option>
                             @foreach($municipios as $municipio)
                             @if($filtro_municipio != 0)
                              @if($municipio->id_provincia == $filtro_municipio)
                             <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
                             @endif
                             @else
                            <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
                             @endif
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
                          name="rua"
                          id="rua"
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
                        <label for="">Planta(Opcional)</label>
                        <input
                        type="file"
                        name="planta"
                        id="planta"
                        class="form-control"
                        value="{{ old('planta') }}"
                        
                        />
                    </div>
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
                          name="iban"
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
                        name="titular"
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
                      name="valor"
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

document.getElementById('nextButton').addEventListener('click', function() {
    var currentStep = document.querySelector('.step:not(.hidden)');
    var nextStep = currentStep.nextElementSibling;
    
    // Realize a validação dos campos do passo atual usando AJAX
    // Exemplo de uso do jQuery AJAX
    $.ajax({
        url: '/validar',
        type: 'POST',
        data: currentStep.getElementsByTagName('input'),
        success: function(response) {
            // Verifique se ocorreu algum erro de validação
            if (response.errors) {
                // Exiba a mensagem de erro para o passo atual
                var errorMessage = response.errors[0];
                var currentStepNumber = parseInt(currentStep.classList[1].split('-')[1]);
                alert('Erro no passo ' + currentStepNumber + ': ' + errorMessage);
            } else {
                // Avance para o próximo passo
                currentStep.classList.add('hidden');
                nextStep.classList.remove('hidden');
            }
        },
        error: function(xhr, status, error) {
            // Manipule erros de requisição AJAX
            console.log(xhr.responseText);
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