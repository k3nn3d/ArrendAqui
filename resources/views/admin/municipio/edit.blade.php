<div class="container">
    <div class="row">
     <div class="form-group col-md-6">
        <label for="inputState">Provincia</label>
        <select id="id_provincia" class="form-control" name="id_provincia" >
            @foreach($provincias as $provincia)
            <option value="{{$provincia->id}}" {{$provincia->id == $municipio->id ? 'selected' : ''}}>{{$provincia->name}}</option>
            @endforeach
           
        </select>
     </div>
     <div class="form-group col-md-6">
        <label for="inputState">Município</label>
      <input type="text" name="name" value="{{ $municipio->name }}" class="form-control">
     </div>
    
    
    </div>
    </div>
    
    
    