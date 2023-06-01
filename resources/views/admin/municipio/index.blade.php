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
     
      <form action="{{ route('admin.user') }}" method="GET" id="form_2">
        @csrf
        <div class="row">
       <div class="col-6" >
      <select class="form-control" name="vc_tipo_utilizador">   
        <option value="" onclick="document.getElementById('form_2').submit()">Filtro de Usuários</option>
        <option value="1" onclick="document.getElementById('form_2').submit()" {{ 1 == 1? 'selected':'' }} >Todas</option>
        <option value="2" onclick="document.getElementById('form_2').submit()" {{ 2 == 1?'selected':'' }}>Condomínio</option>
        <option value="6" onclick="document.getElementById('form_2').submit()" {{ 6 == 1? 'selected':'' }}>Pé-edifício</option>
        <option value="4" onclick="document.getElementById('form_2').submit()" {{ 4 == 1? 'selected':'' }}>Apartamento</option>
        <option value="5" onclick="document.getElementById('form_2').submit()" {{ 5 == 1? 'selected':'' }}>Pau a Pic</option>
        <option value="3" onclick="document.getElementById('form_2').submit()" {{ 3 == 1? 'selected':'' }}>Alvenaria</option>
      </select>
    </div>
 
     <br>
      <div class="col-6">
      <input type="text" name="name" class="form-control" placeholder="Pesquisar por nome" value="@if(isset($name)){{ $name }} @endif" >
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
                <th>Data de registro  </th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
          
             @foreach ($municipios as $municipio)
                 
                  
              
              <tr>
                <td>{{$municipio->name}}</td>
               
                <td>{{ $municipio->created_at->format('d-m-Y h:i') }} </td>
                
                <td>
                  <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                  <div class="dropdown-menu">
                  
                    <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$municipio->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                    <a class="dropdown-item" href="{{route('admin.municipio.delete', $municipio->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                   
           
                  </div>
                </td>
              </tr> 
             
              <div class="modal fade" id="exampleModal{{$municipio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar {{$municipio->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.municipio.update',$municipio->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.municipio.edit')
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

             
              
              @empty($municipio)
              <tr>
                <td colspan="6" style="text-align: center"> Não há resultados</td>
              </tr>
              @endempty
                  
            
             {{-- Cadastrar user --}}
<div class="modal fade" id="exampleModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.municipio.form')

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
              {{-- Cadastrar user --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.municipio.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.municipio.form')

                  <div class="modal-footer">
                      <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button  class="btn  btn-primary" id="ajaxSubmit" >Adicionar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>


@endsection