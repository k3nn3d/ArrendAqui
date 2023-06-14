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
      <form action="{{ route('admin.user') }}" method="GET" id="form_2">
        @csrf
        <div class="row">
       <div class="col-6" >
      <select class="form-control" name="vc_tipo_utilizador"  > 
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
      ><br>
    </div>
  </div>
   <input type="submit"class="btn btn-sm btn-outline-primary" value="Pesquisar">
    </form>
 
 


       
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                
                <th>Casa</th>
                <th> Cliente </th>
                <th> Senhorio</th>
                <th>Estado</th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
          
                  
              @foreach($arrendamentos as $arr)
              <tr>
                <td class="py-1">
                  <img  style="width: 70px; height:70px;" src="{{asset( $arr->casa) }}" alt="image" />
                </td>
                <td> {{ $arr->cliente_p }} {{ $arr->cliente_u }}</td>
                @foreach($users as $user)
                @if($user->id == $arr->id_casa)
                <td> {{ $user->name }} {{ $user->lastname }}</td>
                @endif
                @endforeach
                <td> {{ $arr->estado }}  </td>
                
                <td>
                  <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Ver</a>
                    <a class="dropdown-item" href="#">Editar</a>
                    <a class="dropdown-item" href="#">Eliminar</a>
                   
                  </div>
                </td>
              </tr> 
             
              @endforeach

             @empty($arr)
              
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
              <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.aluguel.form')

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