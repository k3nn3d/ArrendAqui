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
      <h1 class="heading" data-aos="fade-up">Criar Conta</h1>

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
          Criar Conta
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>

<!--HEADER END-->
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-6 col-md-12" >
                <div class="card o-hidden border-1  my-5">
                    
                    <div class="card-body p-0" >
                        
                        
                        <!-- Nested Row within Card Body -->
                            
                        
                            <div class="col-lg-12 col-md-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Criar conta</h1>
                                    </div>
                                   
                                    <form  method="POST" action="{{ route('register') }}" class="user">
                                        @csrf
                                      
                                        <div class="form-group row mb-3">
                                            @if($user->convite)
                                        
                                            <div class="col-sm-12 mb-4">
                                                <label for="">Código de convite</label>
                                                <input type="text" class="form-control form-control-user" name="convite" value="{{ $user->convite }}"  id="exampleFirstName"
                                                    placeholder="código de convite" readonly>        
                                                
                                            </div>
                                            @endif
                                            <h1>Dados</h1>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="">Primeiro nome</label>
                                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  id="exampleFirstName"
                                                    placeholder="Primeiro Nome"  @if($errors->has('name')) style="border-color:red;" @endif required>
                                                        {{ ($errors->has('name')) ? $errors->first('name'): '' }}
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Último nome</label>
                                                <input type="text" class="form-control form-control-user" @error('lastname') is-invalid @enderror value="{{ old('lastname') }}"name="lastname" id="exampleLadtName"
                                                    placeholder="Último Nome" required>
                                                    {{ ($errors->has('lastname')) ? $errors->first('lastname'): '' }}
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Nome de usuário</label>
                                            <input type="text" class="form-control form-control-user" @error('username') is-invalid @enderror value="{{ old('username') }}" name="username" id="exampleUserName"
                                                placeholder="Nome de usuário" required>
                                                {{ ($errors->has('username')) ? $errors->first('username'): '' }}
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control form-control-user" @error('email') is-invalid @enderror value="{{ old('email') }}" name="email" id="exampleEmail"
                                                placeholder="Email" required>
                                                {{ ($errors->has('email')) ? $errors->first('email'): '' }}
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Tipo de conta</label>
                                           <select name="vc_tipo_utilizador" id="vc_tipo_utilizador" class="form-control" >
                                            <option class="tipo" value="">--Selecione um tipo de conta</option>
                                            <option class="tipo" value="6" {{ old('vc_tipo_utilizador')==6 ? 'selected' : '' }}>Cliente</option>
                                            <option class="tipo" value="5" {{ old('vc_tipo_utilizador')==5 ? 'selected' : '' }}>Senhorio</option>
                                            <option class="tipo" value="3" {{ old('vc_tipo_utilizador')==3 ? 'selected' : '' }}>Motorista</option>
                                           </select>
                                        </div>
                                        <div id="senhorio" style="display:none">
                                            <h1>Documentos</h1>
                                            <div class="form-group mb-3">
                                                <label for="">BI</label>
                                                <input type="file" class="form-control form-control-user" @error('bi') is-invalid @enderror value="{{ old('bi') }}" name="bi" id="bi_s"
                                                    placeholder="Email" required>
                                                    {{ ($errors->has('bi')) ? $errors->first('bi'): '' }}
                                            </div>
                                            </div>
                                        <div id="motorista" style="display:none">
                                            <h1>Documentos</h1>
                                            <div class="form-group mb-3">
                                                <label for="">BI</label>
                                                <input type="file" class="form-control form-control-user" @error('bi') is-invalid @enderror value="{{ old('bi') }}" name="bi" id="bi_m"
                                                    placeholder="BI" required>
                                                    {{ ($errors->has('email')) ? $errors->first('bi'): '' }}
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Carta de condução</label>
                                                <input type="file" class="form-control form-control-user" @error('carta') is-invalid @enderror value="{{ old('carta') }}" name="carta" id="carta"
                                                    placeholder="Carta de condução" required>
                                                    {{ ($errors->has('carta')) ? $errors->first('carta'): '' }}
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Registro Criminal</label>
                                                <input type="file" class="form-control form-control-user" @error('registro_criminal') is-invalid @enderror value="{{ old('registro_criminal') }}" name="registro_criminal" id="reg"
                                                    placeholder="Registro criminal" required>
                                                    {{ ($errors->has('registro_criminal')) ? $errors->first('registro_criminal'): '' }}
                                            </div>
                                        </div>
                                        <h1>Segurança</h1>
                                        <div class="form-group row mb-3">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="">Senha</label>
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password"
                                                    id="exampleInputPassword" placeholder="Senha" required>
                                                    {{ ($errors->has('password')) ? $errors->first('password'): '' }}
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Confirmar senha</label>
                                                <input type="password" class="form-control form-control-user" name="password_confirmation"
                                                    id="exampleRepeatPassword" placeholder="Confirmar senha" required>
                                            </div>
                                        </div>
                                       
                                       
                                    
                                        <button class="btn btn-success btn-user btn-block">
                                            Criar Conta
                                        </button>
                                       <!--
                                         <hr>
                                        <a href="#" class="btn btn-danger btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Criar com Google
                                        </a>
                                        <a href="#" class="btn btn-primary btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Criar com Facebook
                                        </a>
                                        -->
                                    </form>
                                    <hr>
                                   
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Já tem uma conta?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Faça Login!</a>
                                    </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<script>
            
        const motorista = document.getElementById('motorista');
        const senhorio = document.getElementById('senhorio');
        const bi_m = document.getElementById('bi_m');
        const bi_c = document.getElementById('bi_s');
        const carta = document.getElementById('carta');
        const reg = document.getElementById('reg');
        const tipos = document.getElementById('vc_tipo_utilizador');


        tipos.addEventListener('change', function() {
        const selectedTipo = tipos.value;
        
                        if(tipos.value == 3){
                            motorista.style.display='block';
                            senhorio.style.display='none';
                            reg.required= true;
                            carta.required=true;
                            bi_m.required=true;
                            bi_s.required=false;
                            bi_s.name='';


                        }
                        if(tipos.value == 5){
                            motorista.style.display='none'
                            senhorio.style.display='block'
                            reg.required=false;
                            carta.required=false;
                            bi_m.required=false;
                            bi_s.required=true;
                            bi_m.name='';


                        }
                        if(tipos.value == 6){
                            motorista.style.display='none'
                            senhorio.style.display='none'
                            reg.required=false;
                            carta.required=false;
                            bi_m.required=false;
                            bi_s.required=false;
                            bi_s.name='';
                
                        }
    });
</script>

   @endsection