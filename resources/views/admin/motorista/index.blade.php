@extends('layouts.admin.index')
  
<div class="container-scroller">  
@section('conteudo')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Motoristas</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Motoristas</li>
        </ol>
      </nav>
    </div>
   
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        

        
      
        <a class="nav-link btn btn-success create-new-button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+ Adicionar novo</a>
        
      <br>
     
      <form action="{{ route('admin.user') }}" method="GET" id="form_2">
        @csrf
        <div class="row">
       <div class="col-6" >
      <select class="form-control" name="vc_tipo_utilizador"   
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
      <input type="text" name="name" class="form-control" placeholder="Pesquisar por nome" value="@if(isset($name)){{ $name }} @endif" 
      <br>
    </div>
  </div>
   <input type="submit"class="btn btn-sm btn-outline-primary" value="Pesquisar">
    </form>
 
 


       
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Foto </th>
                <th> Primeiro Nome </th>
                <th> Usuário </th>
                <th> Email </th>
                <th>Data de registro  </th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
          
                  
              
              <tr>
                <td class="py-1">
                  <img  style="max-width: 70px; border-radius:100%" src="{{asset('tamplate/img/ken.jpg')}}" alt="image" />
                </td>
                <td> </td>
                <td> </td>
                <td>   </td>
                <td>  </td>
                <td>
                  <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Ver</a>
                    <a class="dropdown-item" href="#">Editar</a>
                    <a class="dropdown-item" href="#">Eliminar</a>
                   
                  </div>
                </td>
              </tr> 
             
              

             
              
              <tr>
                <td colspan="6" style="text-align: center"> Não há resultados</td>
              </tr>
                  
            
             {{-- Cadastrar user --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.motorista.form')

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

@endsection