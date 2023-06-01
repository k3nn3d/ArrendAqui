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
                          <h5 class="m-b-10">Dashboard Analytics</h5>
                      </div>
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
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
                  <div> 
                  <button class="prev btn" >Dívidas</button>    <button class="next btn">Pagamentos</button>  
                  </div>     
                  <div class="table-responsive">
                    <div id="step-1" class="step">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Motorista</th>
                          <th>Dívida</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        @forEach($users as $user)    
                       
                       <tr>
                        <td>#</td>
                         <td>
                          {{ $user->name }} {{ $user->lastname }}
                         </td>
                         <td>
                          {{ $user->carroPreco *($motorista->valor/100) }}kz
                         </td>
                          <td>
                            <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                            <div class="dropdown-menu">
                              <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Ver</a>
                              <a class="dropdown-item" href=""><i class="feather icon-trash"></i>Banir Motorista</a>
                            
                             
                            </div>
                          </td>
                        </tr> 
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @include('admin.afiliado.edit')
                                          <div class="modal-footer">
                                              <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                              <button  class="btn  btn-primary" id="ajaxSubmit" >Salvar alterações</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>        
                      
                     @endforeach
          
                       @empty($user)
                      
                        <tr>
                          <td colspan="6" style="text-align: center"> Não há dívidas</td>
                        </tr>
                        @endempty
                            
                      
                      
                       
                                 
           
                            
                        
                      </tbody>
                    </table>
                     </div>
                     <!--=============Pagamrntos================-->
                     <div id="step-2" class="step">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Motorista</th>
                            <th>Dívida</th>
                            <th>Comprovativo</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                      
                          @forEach($users2 as $user2)    
                         
                         <tr>
                          <td>#</td>
                           <td>
                            {{ $user2->name }} {{ $user->lastname }}
                           </td>
                           <td>
                            {{ $user2->carroPreco *($motorista->valor/100) }}kz
                           </td>
                           <td>COMP</td>
                            <td>
                              <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                              <div class="dropdown-menu">
                            
                                <a class="dropdown-item" href=""><i class="feather icon-eye"></i> Confirmar</a>
                           
                                <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Ver</a>
                                <a class="dropdown-item" href=""><i class="feather icon-trash"></i>Banir Motorista</a>
                              
                               
                              </div>
                            </td>
                          </tr> 
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @include('admin.afiliado.edit')
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button  class="btn  btn-primary" id="ajaxSubmit" >Salvar alterações</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        
                       @endforeach
            
                         @empty($user2)
                        
                          <tr>
                            <td colspan="6" style="text-align: center"> Não há pagamentos</td>
                          </tr>
                          @endempty
                              
                        
                        
                         
                                   
             
                              
                          
                        </tbody>
                      </table>
                       
                     
                     
                     </div>
                     
                    
                     
                  </div>
                </div>
            </div>
           
            
           </div>
          
           
      <!-- [ Main Content ] end -->
  </div>
</div>



<!--========================-->
   
            {{-- Cadastrar user --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{route('admin.casa.store')}}" method="post" enctype="multipart/form-data">
                              @csrf       
                              <div class="modal-footer">
                                  <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button  class="btn  btn-primary" id="ajaxSubmit" type="submit" >Adicionar</button>
                              </div>
                          </form>
                      </div>
                  </div>
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
//Collocar cor nos botões
prevBtns[0].style.color='#2ecc71';
  nextBtns[0].style.color='gray';
// Mostre a etapa atual
steps[stepIndex].style.display = 'block';
}

// Função para avançar para a próxima etapa
function nextStep() {
if (currentStep < steps.length - 1) {
  currentStep++;
  showStep(currentStep);
  nextBtns[0].style.color='#2ecc71';
  prevBtns[0].style.color='gray';

  
}
}

// Função para voltar para a etapa anterior
function prevStep() {
if (currentStep > 0) {
  currentStep--;
  showStep(currentStep);
  prevBtns[0].style.color='#2ecc71';
  nextBtns[0].style.color='gray';
  
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