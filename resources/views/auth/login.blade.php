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
      <h1 class="heading" data-aos="fade-up">Entrar</h1>

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
          Entrar
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
            
           
            <div class="col-xl-10 col-lg-6 col-md-9">
                <div style="text-align: center; margin-top:2rem; padding: 1rem; border-radius:0.1rem; @if(!session('acesso')) display:none @endif" class="btn-warning">
                            Você precisa estar logado para acessar a rota! 
                </div>

                
                <div class="card o-hidden border-1  my-5" style="border-r">
                    
                    <div class="card-body p-0">
                        
                        
                        <!-- Nested Row within Card Body -->
                
                        
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Faça Login</h1>
                                    </div>
                                    <form  method="POST" action="{{ route('login') }}" class="user">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control form-control-user" name="username"
                                                id="exampleUsername" aria-describedby="nameHelp"
                                                placeholder="Nome de Usuário" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembrar-me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-user btn-block btn-primary">
                                        Entrar
                                        </button>
                                       
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
                                        <a class="small" href="{{  route('register') }}">Criar uma conta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

 @endsection

 