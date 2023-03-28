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
        

        <div class="card o-hidden border-0   my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Criar Conta</h1>
                            </div>
                            <form  method="POST" action="{{ route('register') }}" class="user">
                                @csrf
                                <div class="form-group row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  id="exampleFirstName"
                                            placeholder="Primeiro Nome"  @if($errors->has('name')) style="border-color:red;" @endif required>
                                                {{ ($errors->has('name')) ? $errors->first('name'): '' }}
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" @error('lastname') is-invalid @enderror value="{{ old('lastname') }}"name="lastname" id="exampleLadtName"
                                            placeholder="Último Nome" required>
                                            {{ ($errors->has('lastname')) ? $errors->first('lastname'): '' }}
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-user" @error('username') is-invalid @enderror value="{{ old('username') }}" name="username" id="exampleUserName"
                                        placeholder="Nome de usuário" required>
                                        {{ ($errors->has('username')) ? $errors->first('username'): '' }}
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-user" @error('email') is-invalid @enderror value="{{ old('email') }}" name="email" id="exampleEmail"
                                        placeholder="Email" required>
                                        {{ ($errors->has('email')) ? $errors->first('email'): '' }}
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password"
                                            id="exampleInputPassword" placeholder="Senha" required>
                                            {{ ($errors->has('password')) ? $errors->first('password'): '' }}
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation"
                                            id="exampleRepeatPassword" placeholder="Confirmar senha" required>
                                    </div>
                                </div>
                               
                                <div class="form-group mb-3">
                                   <select name="vc_tipo_utilizador" id="vc_tipo_utilizador" class="form-control" >
                                    <option value="0">--Selecione um tipo de conta</option>
                                    <option value="6" {{ old('vc_tipo_utilizador')==6 ? 'selected' : '' }}>Cliente</option>
                                    <option value="5" {{ old('vc_tipo_utilizador')==5 ? 'selected' : '' }}>Senhorio</option>
                                   </select>
                                </div>
                        
                            
                                <button class="btn btn-success btn-user btn-block">
                                    Criar Conta
                                </button>
                                <hr>
                                <a href="#" class="btn btn-danger btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Criar com Google
                                </a>
                                <a href="#" class="btn btn-primary btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Criar com Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                @endif
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Já tem uma conta? Faça Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    


   @endsection