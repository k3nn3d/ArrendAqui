                        <div class="container">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <img src="{{ $user->vc_path }}" alt="" style="width: 100px; height:100px">  
                             </div>
                            <div class="form-group col-md-12">
                                <h1>Dados</h1>
                                </div>
                         <div class="form-group col-md-6">
                            <label for="vc_path">Perimeiro nome</label>
                               <input type="text" id="name" class="form-control" name="name"
                                   placeholder="Nome" value="{{ isset($user->name) ? $user->name : "" }}">
                        
                         </div>
                         <div class="form-group col-md-6">
                            <label for="vc_path">Último nome</label>
                               <input type="text" id="name" class="form-control" name="lastname"
                                   placeholder="Último nome" value="{{ isset($user->lastname) ? $user->lastname : "" }}">
                        
                         </div>
                         <div class="form-group col-md-6">
                            <label for="vc_path">Nome de Usuário</label>
                               <input type="text" id="name" class="form-control" name="username"
                                   placeholder="Nome de usuário" value="{{ isset($user->username) ? $user->username : "" }}">
                        
                         </div>
                         <div class="form-group col-md-6">
                            <label for="vc_path">Email</label>
                               <input type="text" id="email" class="form-control" name="email"
                                   placeholder="E-mail" value="{{ isset($user->email) ? $user->email : "" }}">
                        
                         </div>
                         <div class="form-group col-md-6">
                            <label for="vc_path">IBAN(Opcional)</label>
                               <input type="text" id="email" class="form-control" name="email"
                                   placeholder="iban" value="{{ isset($user->iban) ? $user->iban : "" }}">
                        
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
                         @if(Auth::user()->vc_tipo_utilizador == 2 && $user->vc_tipo_utilizador==1)
                         @else
                         <div class="form-group col-md-6">
                            <label for="inputState">Nivel de acesso</label>
                            <select id="nivel_acesso" class="form-control" name="vc_tipo_utilizador" >
                                <option name="vc_tipo_utilizador" value="1" {{ 1 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Admistrador</option>
                                <option name="vc_tipo_utilizador" value="2" {{ 2 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Gerente</option>
                                <option name="vc_tipo_utilizador" value="6" {{ 6 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Cliente</option>
                                <option name="vc_tipo_utilizador" value="3" {{ 3 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Motorista</option>
                                <option name="vc_tipo_utilizador" value="5" {{ 5 == $user->vc_tipo_utilizador ? 'selected' : '' }}>Senhorio</option>
                            </select>
                          </div>
                          @endif
                        
                        
                        
                         
                         
                            <div class="form-group col-md-6 ">
                                <label for="vc_path">Imagem</label>
                                <input type="file" id="vc_path" class="form-control" name="vc_path"
                                    placeholder="Imagem" value="{{ isset($user->vc_path) ? $user->vc_path : "" }}">
                            </div>
                            <div class="form-group col-md-12">
                                <h1>Documentos</h1>
                                </div>
                            
                            <div class="form-group col-md-6 ">
                                <label bfor="vc_path">BI</label>
                                <input type="file" id="bi" class="form-control" name="bi"
                                    placeholder="BI" value="{{ isset($user->bi) ? $user->bi : "" }}">
                            </div>
                            @if($user->vc_tipo_utilizador ==3)
                            <div class="form-group col-md-6 ">
                                <label bfor="vc_path">Carta</label>
                                <input type="file" id="bi" class="form-control" name="bi"
                                    placeholder="BI" value="{{ isset($user->carta) ? $user->carta : "" }}">
                            </div>
                            @endif
                            @if($user->vc_tipo_utilizador == 5 || $user->vc_tipo_utilizador == 3)
                            <div class="form-group col-md-6 ">
                                <label bfor="vc_path">Registro criminal</label>
                                <input type="file" id="bi" class="form-control" name="bi"
                                    placeholder="BI" value="{{ isset($user->registro_criminal) ? $user->registro_criminal : "" }}">
                            </div>
                            @endif
                        
                            
                        
                        
                                                </div>
                                            </div>
                        
                        
                        
                          
                        