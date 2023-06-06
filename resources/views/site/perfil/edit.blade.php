
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
	  <h1 class="heading" data-aos="fade-up">Perfil</h1>
	  <nav
		aria-label="breadcrumb"
		data-aos="fade-up"
		data-aos-delay="200"
	  >
		<ol class="breadcrumb text-center justify-content-center">
		  <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Painel</a></li>
		  <li
			class="breadcrumb-item active text-white-50"
			aria-current="page"
		  >
			Perfil
		  </li>
		</ol>
	  </nav>
	</div>

  </div>
</div>

</div>

<!--HEADER END-->



<div class="section">
    <div class="container">
      <div class="row mb-5">
		<div class="col-lg-1"></div>
		
        <div class="col-lg-3 mb-4">
          <div style="position: relative;
                display: inline-block;">
                <img src="{{ Auth::user()->vc_path }}" alt="user-image" style="width: 200px; height:200px;border-radius:50%">
                <label for="vc_path">
                <img style="position: absolute;
                top: 170px;
                right: 160px;
                width: 25px;
                height: 25px;
                border-radius: 50%;
              " src="imagens/camera.png">
              </label>
                </div>
		
		  
			
				
        </div>
        
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                <form action="{{ route('user.user.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" style="display: none"name="vc_path" value="{{Auth::user()->vc_path}}" id="vc_path">
                    <div class="row">
                      <div class="col-12 mb-3" style="display: flex; overflow:auto;" >
                        
                            <p class="next btn col-3"> <i class="fas fa-user"></i> Dados</p>
                        
                            <p class="next btn col-3">Contatos</p>
                         
                            <p class="next btn col-3">Documentos</p>
                        
                            <p class="next btn col-3">Credenciais</p>
                         
                      
                      </div>
                      
                      <div id="step-1" class="step">
                        <div class="row">
                      <div class="col-12 mb-3">
                        <h1>Dados</h1>
                      </div>
                      @if(Auth::user()->vc_tipo_utilizador==6)
                      <div class="col-12 mb-3">
                        <label for="">Código de convite</label>
                          <input
                          type="text"
                          class="form-control"
                          
                          id="name"
                          placeholder="Código de convite"
                          required min="0"
                          readonly
            value="{{$url}}/{{ Auth::user()->link }}"
                          />
                      </div>
                      
                      @endif
                        
                        <div class="col-6 mb-3">
                          <label for="">Primeiro nome</label>
                            <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            placeholder="Primeiro nome"
                            required min="0"
							value="{{ Auth::user()->name }}"
                            />
                        </div>
						
                        
                        <div class="col-6 mb-3">
                          <label for="">Último nome</label>
                          <input
                          type="text"
                          class="form-control"
                          name="lastname"
                          id="lastname"
                          placeholder="Último nome"
                          required min="0"
						  value="{{ Auth::user()->lastname }}"
                          />
                          
                      </div>
                      <div class="col-12 mb-3">
                        <label for="">Nome de usuário</label>
                        <input
                        type="text"
                        class="form-control"
                        name="username"
                        id="username"
                        placeholder="Nome de usuário"
                        required min="0"
						value="{{ Auth::user()->username }}"
                        />
                       </div>
                     
                      <div class="col-12 mb-3">
                        <label for="">IBAN</label>
                        <input
                        type="text"
                        class="form-control"
                        name="lastname"
                        id="lastname"
                        placeholder="IBAN"
                        required min="0"
            value="{{ Auth::user()->iban }}"
                        />
                    </div>
                          
                       <div class="col-12 mb-3">
                        <label for="">Tipo de conta</label>
                        <input type="hidden" value="{{Auth::user()->vc_tipo_utilizador}}" name="vc_tipo_utilizador"
                        id="vc_tipo_utilizador"
                        >
                        <input
                        type="text"
                        class="form-control"
                        placeholder="Tipo de conta"
                        required
            @switch(Auth::user()->vc_tipo_utilizador)
              @case(1)
              value="Administrador"
                @break
              @case(2)
              value="Gerente"
                @break
              @case(3)
              value="Motorista"
              @break
              @case(6)
              value="Cliente"
              @break
              @case(5)
              value="Senhorio"
              @break
              @default
              
              value="Indefinido"
              
                
            @endswitch  
            readonly
                        />
                    </div>
            
                   
                         
                      <div class="col-12 mb-3">
                        <label for="">Biogradfia</label>
                          <textarea
                          name="descricao"
                          id="descricao   "
                          cols="30"
                          rows="7"
                          class="form-control"
                          style="text-align: start"
                          placeholder="Biografia"
                          required
                         
                          >
@if(old('descricao')!= '')
{{ old('descricao') }}
@endif                         
                      </textarea>
                      </div>

                      <input
                      type="submit"
                      value="Actualizar informações"
                      class="btn btn-primary mb-2"
                      />  
                 
                    </div>
                    </div>
                  
                    
                    <div id="step-2" class="step">
                    <div class="col-12 mb-3">
                      <h1>Informações de contato</h1>
                    </div>
                    <div class="col-12 mb-3">
                      <label for="">Email</label>
                      <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Email"
                      required min="0"
					  value="{{ Auth::user()->email }}"
                      />
                  </div>

                        <div class="col-12 mb-3">
                          <label for="">Telefone</label>
                            <input
                            type="number"
                            name="telefone"
                            id="telefone"
                            class="form-control"
                            placeholder="Telefone"
                            min="0"
							value="{{ Auth::user()->telefone }}"
                            />
                        </div>
                        <input
                        type="submit"
                        value="Actualizar informações"
                        class="btn btn-primary mb-2"
                        />  
                        </div>     
                       <div id="step-3" class="step">

                        <div class="col-12 mb-3">
                          <h1>Documentos</h1>
                        </div>
                       
                        <div class="col-12 mb-3">
                  <label for="">BI</label>
                    <input
                    type="file"
                    class="form-control"
                    name="bi"
                    id="bi"
                    placeholder="BI"
                     
                    />
                  </div>
                  <div class="col-12 mb-3">
                  <label for="">Carta de condução</label>
                    <input
                    type="file"
                    class="form-control"
                    name="carta_de_conducao"
                    id="carta_de_conducao"
                    placeholder="Carta de condução"
                    
                    />
                  </div>
                  <input
                  type="submit"
                  value="Actualizar informações"
                  class="btn btn-primary mb-2"
                  />  
                  </div>
                </form>
                  <form action="{{ route('user.user.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                  <div id="step-" class="step">

                  <div class="col-12 mb-3">
                    <h1>Alterar Palavra-passe</h1>
                  </div>  
                  <div class="col-12 mb-3">
                    <label for="">Password actual</label>
                    <input
                    type="password1"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="Password"
                    required min="0"
        value=""
                    /> 
                    </div>
                  <div class="col-12 mb-3">
                    <label for="">Password</label>
                    <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="Password"
                    required min="0"
        value=""
                    /> 
                    </div>
                    <div class="col-12 mb-3">
                      <label for="">Confirmar Password</label>
                      <input
                      type="password"
                      class="form-control"
                      name="password_confirmation"
                      id="password_confirmation"
                      placeholder="Confirmar password"
                      required min="0"
          value=""
                      />
                    </div>
                    <input
                    type="submit"
                    value="Alterar password"
                    class="btn btn-primary mb-2"
                    /> 

                  </div> 
                  </form>  
                 
                  </div>
                    

                  </div>
                  
                 </div>
                 </div>
                  
                   
                 
                  
                 </div>
                 </div>
               </div>
               </div>
             </div>
         </div>
        
                



      
@if(session('igualdade'))

<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Você está tentando cadastrar uma casa já existente no sitema',
  'error'
)
</script>
@endif


<script>
                // Selecione os elementos necessários
const steps = document.querySelectorAll('.step');
const nextBtns = document.querySelectorAll('.next');
let currentStep = 0;

// Função para mostrar a etapa atual
function showStep(stepIndex) {
  // Oculte todas as etapas
  steps.forEach(step => {
    step.style.display = 'none';
  });
  nextBtns.forEach(btn => {
    btn.style.color = 'gray';
  });
 
  //Mudar a cor dos botões
  nextBtns[stepIndex].style.color= '#005555';
  // Mostre a etapa atual
  steps[stepIndex].style.display = 'block';

}

// Função para avançar para a próxima etapa
//function nextStep() {
  //if (currentStep < steps.length - 1) {
 //   currentStep++;
   // showStep(currentStep);
 // }
//}

// Função para voltar para a etapa anterior
//function prevStep() {
 // if (currentStep > 0) {
   // currentStep--;
   // showStep(currentStep);
 // }
//}

// Adicione os eventos de clique aos botões
nextBtns[0].addEventListener('click',()=>{ 
  showStep(0);
 });
nextBtns[1].addEventListener('click',()=>{ 
  showStep(1);
 });
nextBtns[2].addEventListener('click',()=>{ 
  showStep(2);

});
nextBtns[3].addEventListener('click',()=>{ 
  showStep(3);

});

//prevBtns.forEach(btn => {
  //btn.addEventListener('click', prevStep);
//});

// Mostre a primeira etapa inicialmente
showStep(currentStep);

            </script>
                   


@endsection
