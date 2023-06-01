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
                          <th>Proprietário</th>
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
                          <td>{{ $casa->userName}} {{ $casa->userLastname}}</td>
                          <td>{{ $casa->created_at->format('d/m/y h:i') }} </td>
                       
                          <td>
                            <a class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
                            <div class="dropdown-menu">
                              @if($casa->estado == 'pendente')
                              <a class="dropdown-item" href="{{route('admin.casa.analisar',$casa->id)}}"><i class="feather icon-eye"></i> Analisar</a>
                              @endif
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
                      
                      <!--=======Analisar======-->
                      <div class="modal fade" id="analisar{{$casa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="analisar{{$casa->id}}">Analisar casa{{$casa->provincia}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.casa.update',$casa->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="">Os documentos são verdadeiros?</label>
                                        <label for="n">Sim</label><input type="radio" name="n"><label for="n">Não</label><input type="radio" name="n">
                                        <label for="">Os documentos são codizem?</label>
                                        <label for="n1">Sim</label><input type="radio" name="n1"><label for="n1">Não</label><input type="radio" name="n1">
                                     
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button  class="btn  btn-primary" id="ajaxSubmit" >Confirmar análise</button>
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
                          <h5 class="modal-title" id="exampleModalLabel">Nova casa</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                          <form action="{{route('admin.casa.store')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="container">
                                <div class="row">
                                  <div class="form-group col-md-12">
                                    <h1>Imagens</h1>
                                    </div>
                                   
                                         <div class="col-6 mb-3">
                                          <label for="">Imagem</label>
                                          <input
                                          type="file"
                                          name="vc_path"
                                          id="vc_path"
                                          class="form-control"
                                          value="{{ old('vc_path') }}"
                                          placeholder="Carregue uma imagem"
                                          required
                                          />
                                      </div>
                                      <div class="form-group col-md-12">
                                        <h1>Descrição</h1>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Preço da Renda</label>
                                            <input
                                            type="number"
                                            class="form-control"
                                            name="preco"
                                            id="preco"
                                            value=""
                                            placeholder="Preço da Renda"
                                            required min="0"
                                            />
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Frequêcia</label>
                                          <select class="form-control" name="id_unidade" id="id_unidade">
                                            @foreach ($unidades as $unidade)
                                            <option style="align-content: center" value="{{ $unidade->id }} {{  old('id_unidade') ==$unidade->id ? 'selected' :'' }}">/{{$unidade->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Quartos</label>
                                          <input
                                          type="number"
                                          class="form-control"
                                          name="quartos"
                                          id="quartos"
                                          value="{{old('quartos')}}"
                                          placeholder="Quartos"
                                          required min="0"
                                          />
                                      </div>
                                      <div class="col-6 mb-3">
                                        <label for="">Casas de banho</label>
                                        <input
                                        type="number"
                                        class="form-control"
                                        name="casa_de_banho"
                                        id="casa_de_banho"
                                        value="{{ old('casa_de_banho') }}"
                                        placeholder="Casas de banho"
                                        required min="0"
                                        />
                                    </div>
                                    <div class="col-6 mb-3">
                                      <label for="">Cozinhas</label>
                                      <input
                                      type="number"
                                      class="form-control"
                                      name="cozinha"
                                      id="cozinha"
                                      value="{{ old('cozinha') }}"
                                      placeholder="Cozinhas"
                                      required min="0"
                                      />
                                  </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Salas</label>
                                            <input
                                            type="number"
                                            name="sala"
                                            id="sala"
                                            class="form-control"
                                            value="{{ old('sala') }}"
                                            placeholder="Salas"
                                            required min="0"
                                            />
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Categoria</label>
                                          <select class="form-control" name="id_categoria" id="">
                                            <option style="align-content: center" value="">Categoria</option>
                                            @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}} {{ old('id_categoria')==$categoria->id? 'selected':'' }}">{{ $categoria->name }}</option>
                                            @endforeach
                                            
                                          </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                          Subcategoria
                                          <select class="form-control" name="id_sub_categoria" id="">
                                            <option style="align-content: center" value="">Subcategoria</option>
                                            @foreach($sub_categorias as $sub)
                                            <option value="{{ $sub->id }} {{ old('id_sub_categotia')==$sub->id? 'selected':'' }}">{{$sub->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Detalhes</label>
                                            <textarea
                                            name="descricao"
                                            id="descricao   "
                                            cols="30"
                                            rows="7"
                                            class="form-control"
                                            style="text-align: start"
                                            placeholder=""
                                            required
                                           
                                            >
                            @if(old('descricao')!= '')
                            {{ old('descricao') }}
                            @else
                            Detalhes
                            @endif                         
                                        </textarea>
                                        </div>
                            
                                      
                                        <div class="form-group col-md-12">
                                          <h1>Localização</h1>
                                          </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Província</label>
                                          <select class="form-control" name="provincia" id="provincia">
                                            <option style="align-content: center" value="">Provincia</option>
                                            @foreach($provincias as $provincia)
                                            <option value="{{ $provincia->id }} {{ old('provincia')==$provincia->id? 'selected':'' }} ">{{ $provincia->name }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Município</label>
                                          <select class="form-control" name="municipio" id="municipio">
                                            <option  value="">Município</option>
                                             @foreach($municipios as $municipio)
                                           
                                             <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
                                             @endforeach
                                          </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                          <label for="">Bairro</label>
                                          <input
                                          type="text"
                                          class="form-control"
                                          name="bairro"
                                          id="bairro"
                                          value="{{ old('bairro') }}"
                                          placeholder="Bairro"
                                          required
                                          />
                                      </div>
                                      <div class="col-6 mb-3">
                                        <label for="">Rua</label>
                                          <input
                                          type="text"
                                          class="form-control"
                                          name="bairro"
                                          id="bairro"
                                          value="{{ old('rua') }}"
                                          placeholder="Rua"
                                          required 
                                          />
                                      </div>
                                        
                                    
                                    <div class="form-group col-md-12">
                                      <h1>Documentos</h1>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <label for="">Planta(Opcional)</label>
                                        <input
                                        type="file"
                                        name="planta"
                                        id="planta"
                                        class="form-control"
                                        value="{{ old('planta') }}"
                                        placeholder="Carregue uma imagem"
                                        required
                                        />
                                    </div>
                                    <div class="col-6 mb-3">
                                      <label for="">Propriedade</label>
                                      <input
                                      type="file"
                                      name="propriedade"
                                      id="propriedade"
                                      class="form-control"
                                      value="{{ old('propriedade') }}"
                                      placeholder="Carregue uma imagem"
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