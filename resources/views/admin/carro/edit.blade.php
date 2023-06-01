<div class="container">
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
                value="{{ $carro->preco }}"
                placeholder="Preço da Renda"
                required min="0"
                />
            </div>
           
            <div class="col-3 mb-3">
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
          <div class="col-3 mb-3">
            <label for="">carros de banho</label>
            <input
            type="number"
            class="form-control"
            name="carro_de_banho"
            id="carro_de_banho"
            value="{{ old('carro_de_banho') }}"
            placeholder="carros de banho"
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
                <option value="{{ $provincia->id }} {{ old('provincia')==$provincia->id? 'selected':'' }} ">{{ $provincia->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-4 mb-3">
              <label for="">Município</label>
              <select class="form-control" name="municipio" id="municipio">
                <option  value="">Município</option>
                 @foreach($municipios as $municipio)
               
                 <option value="{{ $municipio->id }} {{ old('municipio')==$municipio->id? 'selected':'' }}">{{ $municipio->name }}</option>
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
 

        
    
    
     
     
     
    
  
    
    
    </div>
    </div>
    
    