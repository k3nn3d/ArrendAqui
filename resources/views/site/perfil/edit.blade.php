
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
	  <h1 class="heading" data-aos="fade-up">Editar</h1>
	  <nav
		aria-label="breadcrumb"
		data-aos="fade-up"
		data-aos-delay="200"
	  >
		<ol class="breadcrumb text-center justify-content-center">
		  <li class="breadcrumb-item"><a href="{{route('user.perfil')}}">Perfil</a></li>
		  <li
			class="breadcrumb-item active text-white-50"
			aria-current="page"
		  >
			Editar
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
		
        <div class="col-lg-3">
			<img src="{{ Auth::user()->vc_path }}" alt="user-image" style="border-radius: 70px; height:150px; width:150px">
			<div class="mb-4">
				<label for="vc_path"><i class="fas fa-camera"></i>Carregar imagem</label>
				<input type="file" style="display: none" id="vc_path">
		    </div>
			<div style="border-radius:4px" >
				<ul style="margin:0; padding:0">
					<li class="btn-success mb-2" style="padding:0.5rem">
						<a href="">Documentos</a>
					</li>
					<li class="btn-success mb-2" style="padding:0.5rem">
						<a href="">Informações de contato</a>
					</li>
					<li class="btn-success mb-4" style="padding:0.5rem">
						<a href="">Credenciais</a>
					</li>
				</ul>
			</div>
        </div>
        
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                <form action="{{ route('user.user.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
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
                    <div class="col-6 mb-3">
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
                        <div class="col-6 mb-3">
                          <label for="">Telefone</label>
                            <input
                            type="number"
                            name="telefone"
                            id="telefone"
                            class="form-control"
                            placeholder="Telefone"
                            required min="0"
							value="{{ Auth::user()->telefone }}"
                            />
                        </div>
                       
                        <div class="col-12 mb-3">
							<label for="">BI</label>
							  <input
							  type="file"
							  class="form-control"
							  name="bi"
							  id="bi"
							  placeholder="BI"
							  required 
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
							  required 
							  />
						  </div>
                       
                        
                        <div class="col-12 mb-3">
                          Tipo de conta
                          <input
                          type="text"
                          class="form-control"
                          name="vc_tipo_utilizador"
                          id="vc_tipo_utilizador"
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
							  @case(5)
							  value="Cliente"
								@break
							  @case(6)
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

                      
                    </div>
                    <input
                   type="submit"
                   value="Actualizar informações"
                   class="btn btn-primary mb-2"
                   />

                  </div>
                  
                 </div>
                  
                   
                 
                  
                 </div>
                 </div>
               </div>
               </div>
             </div>
         </div>
        </form>
                
@if(session('igualdade'))

<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Você está tentando cadastrar uma casa já existente no sitema',
  'error'
)
</script>
@endif
                   


@endsection
