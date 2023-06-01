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
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
               
                <th> Usuário </th>
                <th>Comentário</th>
                <th>Estrelas dadas ao site</th>
                <th>Data de registro  </th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
          
                  
              @foreach ($comentarios as $comment)
                  
             
              <tr>
               
               
                <td> {{ $comment->userName }} {{ $comment->userLastname }}</td>
                <td>{{ $comment->conteudo }}</td>
                <td>{{ $comment->estrelas }}</td>
                <td> {{ $comment->created_at->format('d/m/y h:i') }}  </td>
              
                <td>
                  <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                  <div class="dropdown-menu">
                  
                    <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$comment->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                    <a class="dropdown-item" href="{{route('admin.comentario.delete', $comment->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                   
           
                  </div>
                </td>
              </tr> 
             
              <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar {{$comment->name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          
                        </div>
                    </div>
                </div>
            </div>        
            
              @endforeach

             
              @empty($comment)
              <tr>
                <td colspan="6" style="text-align: center"> Não há comentários</td>
              </tr>
              @endempty
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
 
  
 </div>
 @if(session('eliminado'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Comentário eliminado com sucesso',
  'success'
)
</script>
@endif
@if(session('eliminado_f'))
      
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao eliminar Comentário',
  'error'
)
</script>
@endif



@endsection