@extends('layouts.admin.index')
@section('conteudo')
    {{-- ==Níveis de Acesso==
    * 1-Administrador
    * 2-Gerente
    * 3-Motorista
    * 4-Afiliado
    * 5-Alugador
    * 6-Cliente
    --}}
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

                <button type="button" class="btn " >
                  <i class="feather icon-plus"></i>
              </button>
              
                  <a class="nav-link btn btn-success create-new-button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">+ Adicionar novo</a>
                  
                
              <br>
             
              <form action="{{ route('admin.user') }}" method="GET" id="form_2">
                @csrf
                <div class="row">
               <div class="col-6" >
              <select class="form-control" name="vc_tipo_utilizador" >  
                <option value="" onclick="document.getElementById('form_2').submit()">Filtro de Usuários</option>
                <option value="1" onclick="document.getElementById('form_2').submit()" {{ 1 == $tipo? 'selected':'' }} >Administradores</option>
                <option value="2" onclick="document.getElementById('form_2').submit()" {{ 2 == $tipo? 'selected':'' }}>Gerentes</option>
                <option value="3" onclick="document.getElementById('form_2').submit()" {{ 3 == $tipo? 'selected':'' }}>Motoristas</option>
                <option value="5" onclick="document.getElementById('form_2').submit()" {{ 5 == $tipo? 'selected':'' }}>Senhorios</option>
                <option value="6" onclick="document.getElementById('form_2').submit()" {{ 6 == $tipo? 'selected':'' }}>Clientes</option>
             
              </select>
            </div>
         
             <br>
              <div class="col-6">
              <input type="text" name="name" class="form-control" placeholder="Pesquisar por nome" value="@if(isset($name)){{ $name }} @endif" style="color: black">
              <br>
            </div>
          </div>
           <input type="submit"class="btn btn-sm btn-outline-primary" value="Pesquisar">
            </form>
         
         
        
        
               
               
                <div class="table-responsive">
                  <table class="table table-striped" id="minha-tabela">
                    <thead>
                      <tr>
                        <th> Foto </th>
                        <th> Nome </th>
                        <th> Usuário </th>
                        <th> Email </th>
                        <th>Data de registro  </th>
                        <th>Ações  </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                          
                      
                      <tr>
                        <td class="py-1">
                          <img  style="max-width: 50px; max-height:50px; border-radius:100%" src="{{$user->vc_path}}" alt="image" />
                        </td>
                        <td>{{ $user->name }} {{ $user->lastname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/y h:i a') }}</td>
                        <td>
                          <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Ver</a>
                            <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$user->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                            @if(Auth::user()->vc_tipo_utilizador==2 &&  $user->vc_tipo_utilizador==1 )
                            @else
                            <a class="dropdown-item" href="{{route('admin.user.delete', $user->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                           @endif
                          </div>
                        </td>
                      </tr> 
        
                            
                      <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$user->mame}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @include('admin.user.edit')
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
                          @include('admin.user.form')
        
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
          <!-- Latest Customers end -->
      </div>
      <!-- [ Main Content ] end -->


<!-- [ Main Content ] end -->


    

        
@if(session('editada'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Informações editadas com sucesso',
  'success'
)
</script>
@endif
@if(session('editada_f'))
      
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao editar informações',
  'error'
)
</script>
@endif
@if(session('cadastrada'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Usuário cadastrado com sucesso',
  'success'
)
</script>
@endif
@if(session('cadastrada_f'))
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao cadastrar usuário',
  'error'
)
</script>
@endif
@if(session('eliminada'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Usuário eliminado com sucesso',
  'success'
)
</script>
@endif
@if(session('editada_f'))
      
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao eliminar usuário',
  'error'
)
</script>
@endif

<script>
  $(document).ready(function() {
  $('#minha-tabela').DataTable();
});



$(document).ready(function() {
  $('#minha-tabela').DataTable({
    lengthMenu: [10, 25, 50],
    searching: true,
    ordering: true,
    paging: true
    // Mais opções...
  });
});

</script>

@endsection

