@extends('layouts.admin.index')
@section('conteudo')
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
     
      <form action="{{ route('admin.carro') }}" method="GET" id="form_3">
        @csrf
        <div class="row">
       <div class="col-6" >
      <select class="form-control" name="vc_tipo_utilizador">
        <option value="" onclick="document.getElementById('form_3').submit()">Todos</option>
        <option value="1" onclick="document.getElementById('form_3').submit()" {{ 1 == 1? 'selected':'' }} >Todos</option>
        <option value="2" onclick="document.getElementById('form_3').submit()" {{ 2 == 1? 'selected':'' }}>Transporte</option>
        <option value="6" onclick="document.getElementById('form_3').submit()" {{ 6 == 1? 'selected':'' }}>Frete</option>
      </select>
    </div>
 
     <br>
      <div class="col-6">
      <input type="text" name="name" class="form-control" placeholder="Pesquisar por nome" value="@if(isset($name)){{ $name }} @endif" 
      ><br>
    </div>
  </div>
   <input type="submit"class="btn btn-sm btn-outline-primary" value="Pesquisar">
    </form>
 
 


       
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Foto </th>
                <th> Marca </th>
                <th> Modelo </th>
                <th> Proprietário </th>
                <th>Data de registro  </th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
             
                  @foreach($carros as $carro)
                  
              
              <tr>
                <td class="py-1">
                  <img  style="max-width: 70px;" src="{{ asset($carro->vc_path) }}" alt="image" />
                </td>
               
               <td>{{ $carro->marca }}</td>
               <td>{{ $carro->modelo }}</td>
               <td>{{ $carro->userName }} {{ $carro->userLastname }}</td>
               <td>{{ $carro->created_at->format('d-m-Y h:i') }}</td>
                
                  <td>
                    <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Analisar</a>
                      <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$carro->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                      <a class="dropdown-item" href="{{route('admin.carro.delete', $carro->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                    
                     
                    </div>
                  </td>
                </tr> 
                <div class="modal fade" id="exampleModal{{$carro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{$carro->marca}} {{ $carro->modelo }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                              <form action="{{route('admin.carro.update',$carro->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @include('admin.carro.edit')
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
                
  
               
                @empty($carro)
                <tr>
                  <td colspan="6" style="text-align: center"> Não há resultados</td>
                </tr>
                    
                @endempty
              
              
            
             
             

             
              
            
               
                        
             {{-- Cadastrar user --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.carro.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.carro.form')

                  <div class="modal-footer">
                      <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button  class="btn  btn-primary" id="ajaxSubmit" >Adicionar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

              
             
              
                  
              
            </tbody>
          </table>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
 
  
 </div>

@endsection