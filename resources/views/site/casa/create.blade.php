@extends('layouts.site.index')
@section('conteudo')
<!--HEADER START-->
<div
class="hero page-inner overlay"
style="background-image: url('tamplate/images/hero_bg_1.jpg')"
>

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">Pôr em Aluguel</h1>

      <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li
            class="breadcrumb-item active text-white-50"
            aria-current="page"
          >
          Pôr em Aluguel
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>

<!--HEADER END-->

<div class="section">
    <div class="container">
      <div class="row mb-5">
        <h2 style="text-align: center" class="mb-5" data-aos="fade-up" data-aos-delay="200">Cadastre um imóvel</h2>
        <div class="col-lg-3">

        </div>
        
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <form action="{{route('user.casa.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
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
                        <div class="col-9 mb-3">
                          <label for="">Preço da Renda</label>
                            <input
                            type="number"
                            class="form-control"
                            name="preco"
                            id="preco"
                            value="{{ old('preco') }}"
                            placeholder="Preço da Renda"
                            required min="0"
                            />
                        </div>
                        <div class="col-3 mb-3">
                          <label for="">Frequêcia</label>
                          <select class="form-control" name="id_unidade" id="id_unidade">
                            @foreach ($unidades as $unidade)
                            <option style="align-content: center" value="{{ $unidade->id }} {{ old('id_unidade')==$unidade->id? 'selected' :'' }}">/{{$unidade->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-3 mb-3">
                          <label for="">Quartos</label>
                          <input
                          type="number"
                          class="form-control"
                          name="quartos"
                          id="quartos"
                          value="{{ old('quartos') }}"
                          placeholder="Quartos"
                          required min="0"
                          />
                      </div>
                      <div class="col-3 mb-3">
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
                    <div class="col-3 mb-3">
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
                        <div class="col-3 mb-3">
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
                        <div class="col-12 mb-3">
                          <label for="">Categoria</label>
                          <select class="form-control" name="id_categoria" id="">
                            <option style="align-content: center" value="">Categoria</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}} {{ old('id_categoria')==$categoria->id? 'selected':'' }}">{{ $categoria->name }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                        <div class="col-12 mb-3">
                          Subcategoria
                          <select class="form-control" name="id_sub_categoria" id="">
                            <option style="align-content: center" value="">Subcategoria</option>
                            @foreach($sub_categorias as $sub)
                            <option value="{{ $sub->id }} {{ old('id_sub_categotia')==$sub->id? 'selected':'' }}">{{$sub->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-4 mb-3">
                          <label for="">Província</label>
                          <select class="form-control" name="provincia" id="provincia">
                            <option style="align-content: center" value="">Provincia</option>
                            @foreach($provincias as $provincia)
                            <option value="{{ $provincia->id }} {{ old('provincia')==$provincia->id? 'selected':'' }} {{ $provincia->id == 'selected'? $filtro_municipio=$provincia->id : false }}">{{ $provincia->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-4 mb-3">
                          <label for="">Município</label>
                          <select class="form-control" name="municipio" id="municipio">
                            <option style="align-content: center" value="">Município</option>
                             @foreach($municipios as $municipio)
                             @if($filtro_municipio != 0)
                              @if($municipio->id_provincia == $filtro_municipio)
                             <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
                             @endif
                             @else
                            <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
                             @endif
                             @endforeach
                          </select>
                        </div>
                        <div class="col-4 mb-3">
                          Bairro
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
                      <div class="col-12 mb-3">
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
                        <div class="col-12 mb-3">
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

                      
                    </div>
                    <input
                   type="submit"
                   value="Cadastrar bem"
                   class="btn btn-primary mb-2"
                   />
     
                   <input
                   type="reset"
                   value="Limpar"
                   class="btn btn-warning"
                   />

                  </div>
                  <div class="col-lg-2">
                   {{-- <img src="imagens/casa2.jpg" style="height: 60vh; width:56vh" alt="item image">--}}
                  </div>
                 </div>
                  
                   
                 
                   <div class="col-1"></div>
                 </div>
                 </div>
               </div>
               </div>
             </div>
         </div>
        </form>
                
@if(session('igualdade'))

<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Você está tentando cadastrar uma casa já existente no sitema',
  'error'
)
</script>
@endif





<!-- JavaScript -->
<script>
  // selecione os elementos DOM
  const provinciaSelect = document.getElementById('provincia');
  const municipioSelect = document.getElementById('municipio');

  // atualize a lista de municípios quando a província for alterada
  provinciaSelect.addEventListener('change', () => {
    // obtenha o valor selecionado da província
    const provinciaSelecionada = provinciaSelect.value;

    // faça uma chamada AJAX para obter a lista de municípios correspondentes
    fetch(`/municipios/${provinciaSelecionada}`)
      .then(response => response.json())
      .then(municipios => {
        // limpe a lista de municípios existente
        municipioSelect.innerHTML = '';

        // adicione as opções de município à lista
        if (municipios.length) {
          municipios.forEach(municipio => {
            const option = document.createElement('option');
            option.text = municipio.name;
            option.value = municipio.id;
            municipioSelect.add(option);
          });
        } else {
          // se não houver municípios disponíveis, adicione uma opção vazia
          const option = document.createElement('option');
          option.text = '';
          municipioSelect.add(option);
        }
      });
  });
</script>


@endsection