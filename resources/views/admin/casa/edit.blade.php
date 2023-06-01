<div class="container">
    <div class="row">
      <div class="form-group col-md-12">
        <h1>Fotos</h1>
        </div>
        <div class="col-12 mb-3">
           <img src="{{ $casa->vc_path }}" alt="" style="width: 100%; height:100%">  
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
          <div class="col-6 mb-3">
            <label for="">Imagem</label>
            <input
            type="file"
            name="vc_path1"
            id="vc_path"
            class="form-control"
            value="{{ old('vc_path') }}"
            placeholder="Carregue uma imagem"
            required
            />
        </div>
        <div class="col-6 mb-3">
          <label for="">Imagem</label>
          <input
          type="file"
          name="vc_path2"
          id="vc_path"
          class="form-control"
          value="{{ old('vc_path') }}"
          placeholder="Carregue uma imagem"
          required
          />
      </div>
          <div class="form-group col-md-12">
            <h1>Descricão</h1>
            </div>
            <div class="col-6 mb-3">
              <label for="">Preço da Renda</label>
                <input
                type="number"
                class="form-control"
                name="preco"
                id="preco"
                value="{{ $casa->preco }}"
                placeholder="Preço da Renda"
                required min="0"
                />
            </div>
            <div class="col-6 mb-3">
              <label for="">Frequêcia</label>
              <select class="form-control" name="id_unidade" id="id_unidade">
                @foreach ($unidades as $unidade)
                <option style="align-content: center" value="{{ $unidade->id }} {{  $casa->id_unidade ==$unidade->id? 'selected' :'' }}">/{{$unidade->name}}</option>
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
              value="{{ $casa->quartos}}"
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
            value="{{ $casa->casa_de_banho}}"
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
          value="{{ $casa->cozinha}}"
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
                value="{{ $casa->sala}}"
                placeholder="Salas"
                required min="0"
                />
            </div>
            <div class="col-6 mb-3">
              <label for="">Categoria</label>
              <select class="form-control" name="id_categoria" id="">
                <option style="align-content: center" value="">Categoria</option>
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}} {{ $casa->id_categoria==$categoria->id? 'selected':'' }}">{{ $categoria->name }}</option>
                @endforeach
                
              </select>
            </div>
            <div class="col-6 mb-3">
              Subcategoria
              <select class="form-control" name="id_sub_categoria" id="">
                <option style="align-content: center" value="">Subcategoria</option>
                @foreach($sub_categorias as $sub)
                <option value="{{ $sub->id }} {{ $casa->id_subcategoria==$sub->id? 'selected':'' }}">{{$sub->name}}</option>
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
@if( $casa->descricao!= '')
{{ $casa->descricao}}
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
                <option value="{{ $provincia->id }} {{ $casa->id_provincia==$provincia->id? 'selected':'' }} ">{{ $provincia->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-6 mb-3">
              <label for="">Município</label>
              <select class="form-control" name="municipio" id="municipio">
                <option  value="">Município</option>
                 @foreach($municipios as $municipio)
               
                 <option value="{{ $municipio->id }}  {{ $casa->id_municipio==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
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
              value="{{ $casa->bairro}}"
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
              value="{{ $casa->rua}}"
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
    
    