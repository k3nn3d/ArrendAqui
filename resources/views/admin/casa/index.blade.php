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
               
                <form action="{{ route('admin.casa') }}" method="GET" id="form_2">
                  @csrf
                  <div class="row">
                 <div class="col-6" >
                <select class="form-control" name="sub_categoria_id"> 
                  <option value="" onclick="document.getElementById('form_2').submit()">Todas subcategorias</option>
                  @foreach($sub_categoria as $sub_categoria )
                  <option value="{{ $sub_categoria->id }}" {{ $sub_categoria->id==$sub_id? 'selected':'' }} onclick="document.getElementById('form_2').submit()" >{{ $sub_categoria->name }}</option>
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
                          <th>#</th>
                          <th>Imagem</th>
                          <th>Plano</th>
                          <th>Estado</th>
                          <th>Data de registro</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                            
                        @foreach($casa as $casa)
                       <tr>
                          <td>{{ $casa->id }}</td>
                          <td><img src="{{ $casa->vc_path }}" alt="" style="width: 60px; height:60px;"></td>
                          <td>{{ $casa->plano }}</td>
                          <td>{{ $casa->estado }}</td>
                          <td>{{ $casa->created_at->format('d/m/y h:i') }} </td>
                       
                          <td>
                            <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Analisar</a>
                              <a   class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$casa->id}}" data-whatever="@getbootstrap" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-refresh-cw"></i> Editar</a>
                              <a class="dropdown-item" href="{{route('admin.casa.delete', $casa->id)}}"><i class="feather icon-trash"></i>Eliminar</a>
                            
                             
                            </div>
                          </td>
                        </tr> 
                        <div class="modal fade" id="exampleModal{{$casa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">{{$casa->mame}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{{route('admin.casa.update',$casa->id)}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          @include('admin.casa.edit')
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
                        
          
                       
                        @empty($casa)
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
                        <form action="{{route('admin.casa.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('admin.casa.form')
          
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button  class="btn  btn-primary" id="ajaxSubmit" type="submit" >Adicionar</button>
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
          
           
      <!-- [ Main Content ] end -->
  </div>
</div>



<!--========================-->
   

@endsection