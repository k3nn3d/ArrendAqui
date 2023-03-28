<div class="container">
  <div class="row">
   <div class="form-group col-md-6">
      <label for="vc_path">Nome</label>
         <input type="text" id="name" class="form-control" name="name"
             placeholder="Nome" value="{{ isset($user->name) ? $user->name : "" }}">
  
   </div>
   <div class="form-group col-md-6">
      <label for="vc_path">Email</label>
         <input type="text" id="email" class="form-control" name="email"
             placeholder="E-mail" value="{{ isset($user->email) ? $user->email : "" }}">
  
   </div>
   <div class="form-group col-md-6">
      <label for="vc_path">Password</label>
         <input type="password" id="password" class="form-control" name="password"
             placeholder="Password" value="{{ isset($user->password) ? $user->password : "" }}" >
  
   </div>
   <div class="form-group col-md-6">
      <label for="vc_path">Confirmar Password</label>
         <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
             placeholder="Confirmar password" >
   </div>
  
   </div>
   
   <div class="col-md-6 ">
      <div class="form-group">
          <label for="vc_path">Imagem</label>
          <input type="file" id="vc_path" class="form-control" name="vc_path"
              placeholder="Imagem" value="{{ isset($galeria->vc_path) ? $galeria->vc_path : "" }}">
      </div>
  </div>
  <div class="col-md-6 ">
      <div class="form-group">
          <label bfor="vc_path">Imagem do BI</label>
          <input type="file" id="bi" class="form-control" name="bi"
              placeholder="BI" value="{{ isset($galeria->bi) ? $galeria->bi : "" }}">
      </div>
  </div>
  <div class="form-group col-md-6">
      <label for="inputState">Nivel de acesso</label>
      <select id="nivel_acesso" class="form-control" name="vc_tipo_utilizador" >
          <option name="vc_tipo_utilizador" value="1" {{ 1 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Admistrador</option>
          <option name="vc_tipo_utilizador" value="2" {{ 2 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Gerente</option>
          <option name="vc_tipo_utilizador" value="6" {{ 6 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Cliente</option>
          <option name="vc_tipo_utilizador" value="3" {{ 3 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Motorista</option>
          <option name="vc_tipo_utilizador" value="5" {{ 5 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Alugador</option>
          <option name="vc_tipo_utilizador" value="4" {{ 4 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Afiliado</option>
      </select>
    </div>
  
  
                          </div>
                      </div>
  
  
  
  
    