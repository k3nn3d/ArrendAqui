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
        <select id="nivel_acesso" class="form-control" name="vc_tipo_utilizador" >
          <option value="">Selecione uma Categoria</option>
          @foreach( $categorias as $categoria)
          <option value="{{$categoria->id}}" {{ $categoria->id==$categoria->id? 'selected':'' }}>{{$categoria->name}}</option>
          @endforeach
       </select>
    </div>
 
     <br>
      <div class="col-6">
      <input type="text" name="name" class="form-control" placeholder="Pesquisar por nome" value="@if(isset($name)){{ $name }} @endif">
      <br>
    </div>
  </div>
   <input type="submit"class="btn btn-sm btn-outline-primary" value="Pesquisar">
    </form>
 
 


       
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Subcategoria </th>
                <th> Categoria </th>
                <th>Ações  </th>
              </tr>
            </thead>
            <tbody>
          
                  @csrf
              
              @foreach($sub_categoria as $sub_categoria)
                <td >
                  {{$sub_categoria->id}}
                </td>
                <td> {{$sub_categoria->name}}</td>
                <td> {{$sub_categoria->cat_name}}</td>
               
               
                <td>
                  <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Ver</a>



                    <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$sub_categoria->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                    <a class="dropdown-item" href="{{route('admin.sub_categoria.delete', $sub_categoria->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                   
           
       
                  </div>
                </td>
              </tr> 
             





                     
              <div class="modal fade" id="exampleModal{{$sub_categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$sub_categoria->mame}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin.sub_categoria.update',$sub_categoria->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.sub_categoria.edit')
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
          
         @empty($sub_categoria) 
         <tr>
           <td colspan="6" style="text-align: center"> Não há resultados</td>
         </tr>
         @endempty
              

             
            
            
                 {{-- Cadastrar sub_categoria --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nova Subcategoria</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.sub_categoria.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.sub_categoria.form')

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