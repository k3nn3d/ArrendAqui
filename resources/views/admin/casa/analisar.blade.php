@extends('layouts.admin.index')  
@section('conteudo')


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
  <div class="pcoded-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
          <div class="page-block">
              <div class="row align-items-center">
                  <div class="col-md-12">
                      <div class="page-header-title">
                          <h5 class="m-b-10">Analisar casa de ...</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#!">Casas</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
          <!-- table card-1 start -->
          <div class="col-md-12 col-xl-12">

              <div class="card">
                
                <div class="card-body">
                    <div style="display: flex; justify-content:center; ">
                        <div class="btn-primary" style="padding:0.5rem; width:50px; height:50px;border-radius:50%;">1</div>
                        <div class="btn-primary" style="padding:0.1rem; width:100px; height:5px;"></div>
                        <div class="btn-primary" style="padding:0.5rem; width:50px; height:50px;border-radius:50%;">2</div>
                        <div class="btn-primary" style="padding:0.1rem; width:100px; height:5px;"></div>
                        <div class="btn-primary" style="padding:0.5rem; width:50px; height:50px;border-radius:50%;">3</div>
                    </div>
                  
                    
                    <div class="table-responsive">
                        <form action="{{ route('admin.casa.analisar_confirm',['id'=>$casa->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div id="step-1" class="step" style="transition: all 1s">
                           <h3> As informações do senhorio são verdadeiras?</h3>
                           <div style="display:flex;">
                            <div style="width: 20rem; height:20rem;" class="col-4 ">
                                <img src="{{ $casa->userFoto }}" alt="" style="width: 100%; height:100%;">
                                <h4>
                                    {{$casa->userName}} {{$casa->userLastname}}
                                </h4>
                            </div>
                           <div style="width: 800px; height:600px; margin:1rem;" class="col-7 ">
                            <embed src="{{ $casa->userBi }}" type="" style="width: 100%; height:100%;">
                            </div>
                            </div>
                         
                            <input type="radio" name="doc" value="1" id="n">
                            <label for="n">Sim</label>
                            <br>
                            <input type="radio" value="0" name="doc" id="n1">
                            <label for="n1">Não</label>
                            <br>
                            <hr>
                             <button type="button" class="next btn btn-primary">Próximo</button>
                           </div>
                           
                           <div id="step-2" class="step" style="transition: all 1s">
                            <h3> Os documentos conferem?</h3>
                            <div style="display:flex;">
                                <div style="width: 500px; height:500px; margin:1rem">
                                <embed src="{{ $casa->planta }}" type="" style="width: 100%; height:100%;">
                                </div>
                                <div style="width: 500px; height:500px;margin:1rem">
                                <embed src="{{ $casa->propriedade }}" type="" style="width: 100%; height:100%;">
                                </div>
                                <div style="width: 500px; height:500px;margin:1rem">
                                    <embed src="{{ $casa->userBi }}" type="" style="width: 100%; height:100%;">
                                </div>
                            </div>
                            <input type="radio" name="comp_doc" value="1" id="o">
                            <label for="o">Sim</label>
                            <br>
                            <input type="radio" name="comp_doc" value="0" id="o1">
                            <label for="o1">Não</label>
                            <br>
                            <hr>
                             <button type="button" class="prev btn btn-primary">Voltar</button>
                             <button type="button" class="next btn btn-primary">Próximo</button>
                           </div>
                           
                           <div id="step-3" class="step" style="transition: all 1s">
                            <h3> Está apto para ser publicado?</h3>
                            <div style="display:flex;">
                                <div style="width: 500px; height:500px; margin:1rem">
                                <img src="{{ $casa->vc_path }}" alt="" style="width: 100%; height:100%;">
                                </div>
                                <div style="width: 500px; height:500px; margin:1rem">
                                    <embed src="{{ $casa->planta }}" type="" style="width: 100%; height:100%;">
                                    </div>
                            </div>  
                            <div>
                                <p>
                                    Localização: {{ $casa->provincia }}, {{ $casa->municipio }}
                                </p>
                                <p>
                                    Senhorio: {{ $casa->userName }} {{ $casa->userLastname }}
                                </p>
                                <p>
                                    Quartos: {{ $casa->quartos }}
                                </p>
                                <p>
                                    Cozinha: {{ $casa->cozinha }}
                                </p>
                                <p>
                                    Descricão:
                                </p>
                                <p>
                                    {{ $casa->descricao }}  
                                </p>

                            </div>
                            <input type="radio" name="apto" value="1" id="m">
                            <label for="m">Sim</label>
                            <br>
                            <input type="radio" name="apto" value="0" id="m1">
                            <label for="m1">Não</label>
                            <br>
                            <hr>
                             <button type="button" class="prev btn btn-primary">Voltar</button>
                             <button type="submit" class="btn btn-success">Confirmar</button>
                           </div>
                        </form>  
                 
                    </div>
                
                
           
          
          
                 
                 
                 
                </div>
            </div>
           
            
           </div>
          
           
      <!-- [ Main Content ] end -->
  </div>
</div>




<script>
                // Selecione os elementos necessários
const steps = document.querySelectorAll('.step');
const nextBtns = document.querySelectorAll('.next');
const prevBtns = document.querySelectorAll('.prev');
let currentStep = 0;

// Função para mostrar a etapa atual
function showStep(stepIndex) {
  // Oculte todas as etapas
  steps.forEach(step => {
    step.style.display = 'none';
  });

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
             
@endsection