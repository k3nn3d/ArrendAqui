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
       
       
        <div class="col-xl-6 col-lg-6 col-md-9" >
           
            <div class="card o-hidden border-1  my-5">
                
                <div class="card-body p-0" >
                    
                    
                    <!-- Nested Row within Card Body -->
                        
                    
                        <div class="col-lg-12 col-md-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Esqueceu sua palavra-passe?</h1>
                                </div>
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form  method="POST" action="{{ route('password.email') }}" class="user">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email"><i class="feather icon-user"></i> Seu e-mail</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-user @if($errors->has('email'))is-invalid @endif"
                                            value="{{old('email')}}"
                                            placeholder="Seu e-mail" required autofocus>
                                    </div>
                                    
                                   

                                    <button type="submit" id="enviar" class="btn btn-user btn-block btn-primary" disabled>
                                    Enviar link de recuperação 
                                    </button>
                                    <p id="mensagem" style="color:red"></p>
                                   
                                </form>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
  var campoInput = document.getElementById('email');
  var botao = document.getElementById('enviar');
  var timeout;

  campoInput.addEventListener('input', function() {
    if (campoInput.checkValidity()) {
      botao.disabled = false;
      mensagem.textContent = ''; // Limpa a mensagem
    } else {
      botao.disabled = true;
    }
  });

  campoInput.addEventListener('blur', function() {
    if (!campoInput.checkValidity()) {
      mensagem.textContent = 'Insira um endereço de e-mail.'; // Mensagem de explicação
    } else {
      mensagem.textContent = ''; // Limpa a mensagem
    }
  });
  campoInput.addEventListener('input', function() {
    if (campoInput.checkValidity()) {
      mensagem.textContent = ''; // Limpa a mensagem
    }
  });


  campoInput.addEventListener('input', function() {
    clearTimeout(timeout); // Limpa o timeout anterior
    timeout = setTimeout(function() {
      if (campoInput.checkValidity()) {
        mensagem.textContent = ''; // Limpa a mensagem
      } else {
        mensagem.textContent = 'Insira um endereço de e-mail válido.'; // Mensagem de explicação
      
      }
    }, 400); // Define um atraso de 500ms (ajuste conforme necessário)
  });
});




</script>
@endsection