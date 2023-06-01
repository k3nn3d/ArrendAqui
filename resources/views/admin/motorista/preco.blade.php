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
                    <a class="nav-link btn btn-success create-new-button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+ Adicionar novo</a>
                  
                    <br>
                             
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Valor em percentagem</th>
                          <th>Data de registro</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                         @forEach($motoristas as $motorista)   
                       
                       <tr>
                        <td>#</td>
                         <td>
                            {{ $motorista->valor }}%
                         </td>
                         <td>
                            {{ $motorista->created_at->format('d/m/Y h:i') }}
                         </td>
                          <td>
                            <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                            <div class="dropdown-menu">
                          
                              
                              <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{ $motorista->id }}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                              <a class="dropdown-item" href="{{ route('admin.motorista.delete',$motorista->id) }}"><i class="feather icon-trash"></i>Eliminar</a>
                            
                             
                            </div>
                          </td>
                        </tr> 
                        <div class="modal fade" id="exampleModal{{ $motorista->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Editar valor a pagar por motorista</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{{ route('admin.motorista.update',$motorista->id) }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <div class="container">
                                            <div class="row">
                                                    <div class="col-12 mb-3">
                                                      <label for="">Valor</label>
                                                      <input
                                                      type="text"
                                                      name="valor"
                                                      id="valor"
                                                      class="form-control"
                                                      value="{{ $motorista->valor }}"
                                                      placeholder="Valor"
                                                      required
                                                      />
                                                  </div>
                                                </div>
                                            </div> 
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
                       @empty($motorista)
                      
                        <tr>
                          <td colspan="6" style="text-align: center"> Não há registros</td>
                        </tr>
                        @endempty
                            
                      
                      
                       
                                 
           
                            
                        
                      </tbody>
                    </table>
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
                          <h5 class="modal-title" id="exampleModalLabel">Novo preço para pagamento de motorista</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{route('admin.motorista.store')}}" method="post" enctype="multipart/form-data">
                              @csrf   
                              <div class="container">
                                <div class="row">
                                        <div class="col-12 mb-3">
                                          <label for="">Valor</label>
                                          <input
                                          type="text"
                                          name="valor"
                                          id="valor"
                                          class="form-control"
                                          value="{{ old('valor') }}"
                                          placeholder="Valor"
                                          required
                                          />
                                      </div>
                                    </div>
                                </div>
                                
                              <div class="modal-footer">
                                  <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button  class="btn  btn-primary" id="ajaxSubmit" type="submit" >Adicionar</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
             
@endsection