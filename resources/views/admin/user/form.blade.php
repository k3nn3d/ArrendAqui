<div class="container">
<div class="row">
    <div class="form-group col-md-12">
    <h1>Dados</h1>
    </div>
 <div class="form-group col-md-6">
    <label for="vc_path">Perimeiro nome</label>
       <input type="text" id="name" class="form-control" name="name"
           placeholder="Nome" value="">

 </div>
 <div class="form-group col-md-6">
    <label for="vc_path">Último nome</label>
       <input type="text" id="name" class="form-control" name="lastname"
           placeholder="Último nome" value="">

 </div>
 <div class="form-group col-md-6">
    <label for="vc_path">Nome de Usuário</label>
       <input type="text" id="name" class="form-control" name="username"
           placeholder="Nome de usuário" value="">

 </div>
 <div class="form-group col-md-6">
    <label for="vc_path">Email</label>
       <input type="text" id="email" class="form-control" name="email"
           placeholder="E-mail" value="">

 </div>
 <div class="form-group col-md-6">
    <label for="vc_path">IBAN(Opcional)</label>
       <input type="text" id="email" class="form-control" name="email"
           placeholder="iban" value="">

 </div>
 <div class="form-group col-md-6">
    <label for="vc_path">Password</label>
       <input type="password" id="password" class="form-control" name="password"
           placeholder="Password" >

 </div>
 <div class="form-group col-md-6">
    <label for="vc_path">Confirmar Password</label>
       <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
           placeholder="Confirmar password" >
 </div>
 <div class="form-group col-md-6 ">
    <label for="vc_path">Imagem(Opcional)</label>
    <input type="file" id="vc_path" class="form-control" name="vc_path"
        placeholder="Imagem" value="">
</div>

 <div class="form-group col-md-6">
    <label for="inputState">Nivel de acesso</label>
    <select id="nivel_acesso" class="form-control" name="vc_tipo_utilizador" >
        <option name="vc_tipo_utilizador" value="1">Admistrador</option>
        <option name="vc_tipo_utilizador" value="2">Gerente</option>
        <option name="vc_tipo_utilizador" value="3">Motorista</option>
        <option name="vc_tipo_utilizador" value="6">Cliente</option>
        <option name="vc_tipo_utilizador" value="5">Senhorio</option>
    </select>
  </div>


 <div class="form-group col-md-12">
    <h1>Documentos</h1>
 </div>
 
    

    <div class="form-group col-md-6 ">
        <label bfor="vc_path">BI(Opcional)</label>
        <input type="file" id="bi" class="form-control" name="bi"
            placeholder="BI" value="">
    </div>
   
    <div class="form-group col-md-6 ">
        <label bfor="vc_path">Carta(Opcional)</label>
        <input type="file" id="bi" class="form-control" name="bi"
            placeholder="BI" value="{{ isset($user->carta) ? $user->carta : "" }}">
    </div>

   
    <div class="form-group col-md-6 ">
        <label bfor="vc_path">Registro criminal(Opcional)</label>
        <input type="file" id="bi" class="form-control" name="bi"
            placeholder="BI" value="{{ isset($user->registro_criminal) ? $user->registro_criminal : "" }}">
    </div>






                        </div>
                    </div>



