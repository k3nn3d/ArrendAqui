<div class="container">
    <div class="row">
     <div class="form-group col-md-6">
        <label for="inputState">Categoria</label>
        <select id="nivel_acesso" class="form-control" name="id_categoria" >
            <option value="">Selecione uma Categoria</option>
          @foreach( $categorias as $categoria)
          <option value="{{$categoria->id}}" {{ $categoria->id==$categoria->id? 'selected':'' }}>{{$categoria->name}}</option>
          @endforeach
         </select>
     </div>
     <div class="form-group col-md-6">
        <label for="inputState">Subcategotia</label>
      <input type="text" name="name" class="form-control" value="{{ isset($sub_categoria->name) ? $sub_categoria->name : "" }}">
     </div>
    
    
    </div>
    </div>
    
    
    