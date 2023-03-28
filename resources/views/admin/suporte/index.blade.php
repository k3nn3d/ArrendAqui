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
        


        
      
  
        
      <br>
     
      <form action="{{ route('admin.provincia') }}" method="GET" id="form_2">
        @csrf
        <div class="row">
    
 
     <br>
      <div class="col-12">
      <input type="text" name="name" class="form-control" placeholder="Pesquisar por mensagem" value="@if(isset($name)){{ $name }} @endif" style="color: azure">
      <br>
    </div>
  </div>
   <input type="submit"class="btn btn-sm btn-outline-primary" value="Pesquisar">
    </form>
 
 


       
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
               
                <th> Nome </th>
                <th> Email </th>
                <th> Assunto </th>
                <th> Mensagem </th>
                <th>Data de registro  </th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
          
                  
              @foreach ($contatos as $contato)
                  
             
              <tr>
               
               
                <td> {{ $contato->name }}</td>
                <td> {{ $contato->email }}</td>
                <td> {{ $contato->assunto }}</td>
                <td> {{ $contato->mensagem }}</td>
                <td> {{ $contato->created_at->format('d/m/y h:i') }}  </td>
              
                <td>
                  <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="feather icon-refresh-cw"></i> Responder</a>
                    <a class="dropdown-item" href="{{route('admin.provincia.delete', $contato->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                   
                   
           
                  </div>
                </td>
              </tr> 
             
              <div class="modal fade" id="exampleModal{{$contato->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar {{$contato->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.provincia.update',$contato->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.provincia.edit')
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

             
              @empty($contato)
              <tr>
                <td colspan="6" style="text-align: center"> Não há resultados</td>
              </tr>
              @endempty
                  

{{-- Cadastrar user --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nova Província</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.provincia.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.provincia.form')

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