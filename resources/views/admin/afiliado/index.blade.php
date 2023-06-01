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
                          <th>Nome</th>
                          <th>IBAN</th>
                          <th>Valor a pagar</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                        @forEach($users as $user)    
                       
                       <tr>
                        <td>#</td>
                         <td>
                          {{ $user->name }}  {{ $user->lastname }}
                         </td>
                         <td>
                          {{ $user->iban }}
                         </td>
                         <td>
                          {{ $user->pontos * $afiliado->valor}}kz
                         </td>
                          <td>
                            <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                            <div class="dropdown-menu"> 
                              <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Ver</a>
                              <a class="dropdown-item"data-toggle="modal" data-target="#exampleModalP" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-trash"></i>Pagar dívida</a>
                            
                             
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
                      <!--=====Pagar=====-->
                      <div class="modal fade" id="exampleModalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.afiliado.pagar',$user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="container">
                                          <div class="row">
                                                  <div class="col-12 mb-3">
                                                    <label for="">Valor a pagar</label>
                                                    <input
                                                    type="number"
                                                    min="1"
                                                    max="{{ $user->pontos * $afiliado->valor}}"
                                                    name="valor"
                                                    id="valor"
                                                    class="form-control"
                                                    value="{{ $user->pontos * $afiliado->valor}}"
                                                    placeholder="Valor"
                                                    required
                                                    />
                                                </div>
                                                <div class="col-12 mb-3">
                                                  <label for="">Comprovativo</label>
                                                  <input
                                                  type="file"
                                                  name="comprovativo"
                                                  id="comprovativo"
                                                  class="form-control"
                                                  required
                                                  />
                                              </div>
                                              </div>
                                          </div>
                                      
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button  class="btn  btn-primary" id="ajaxSubmit" >Enviar comprovativo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>        
                    
                    @endforeach
                     
          
                       
                      @empty($user)
                        <tr>
                          <td colspan="6" style="text-align: center"> Não há resultados</td>
                        </tr>
                      @endempty
                            
                      
                      
                       
                                 
           
                            
                        
                      </tbody>
                    </table>
                    </div>
                    <div id="step-2" class="step">

                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>IBAN</th>
                            <th>Valor pago</th>
                            <th>Comprovativo</th>
                            <th>Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                      
                          @forEach($users2 as $user2)    
                         
                         <tr>
                          <td>#</td>
                           <td>
                            {{ $user2->name }}  {{ $user2->lastname }}
                           </td>
                           <td>
                            {{ $user2->iban }}
                           </td>
                           <td>
                            {{ $user2->valorPago}}kz
                           </td>
                           <td>
                            <img src="{{ $user2->comprovativoPagamento}}" alt="" style="width: 50px; height:50px;">
                            <embed src="{{ $user2->comprovativoPagamento}}" type="" style="width: 50px; height:50px;">
                           </td>
                            <td>
                              <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                              <div class="dropdown-menu"> 
                                <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$user2->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Ver</a>      
                              </div>
                            </td>
                          </tr> 
                          <div class="modal fade" id="exampleModal{{$user2->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comprovativo de pagamento</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <img src="{{$user2->comprovativoPagamento}}" alt="">
                                            <embed src="{{$user2->comprovativoPagamento}}" type="" alt="">
                                              <hr>
                                              <div>
                                                <p> Valor pago: {{$user2->valorPago}}kz</p>
                                                <p> Uuário: {{$user2->name}} {{$user2->lastname}}</p>
                                              </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn  btn-success" data-dismiss="modal">Ok</button>
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