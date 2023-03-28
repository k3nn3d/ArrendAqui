@extends('layouts.site.index')
@section('conteudo')

<!--===Script Area===-->
@if(session('cadastrada'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Recebemos sua mensagem. Em breve responderemos',
  'success'
)
</script>
@endif
@if(session('cadastrada_f'))
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao enviar sua mensagem. Verifique se preencheu todos os campos',
  'error'
)
</script>
@endif
<!--===End Script Area===-->




<!--HEADER START-->
<div
class="hero page-inner overlay"
style="background-image: url('tamplate/images/hero_bg_1.jpg')"
>
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">Contacte-nos</h1>

      <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li
            class="breadcrumb-item active text-white-50"
            aria-current="page"
          >
            Contacte-nos
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
  <div class="row">
    <div
      class="col-lg-4 mb-5 mb-lg-0"
      data-aos="fade-up"
      data-aos-delay="100"
    >
      <div class="contact-info">
        <div class="address mt-2">
          <i class="icon-room"></i>
          <h4 class="mb-2">Localização:</h4>
          <p>
           Angola, Lunada, Rangel, Km CTT
          </p>
        </div>

        <div class="open-hours mt-4">
          <i class="icon-clock-o"></i>
          <h4 class="mb-2">Horário:</h4>
          <p>
            Segunda à Sexta:<br />
            9:00 AM - 8:00 PM
          </p>
        </div>

        <div class="email mt-4">
          <i class="icon-envelope"></i>
          <h4 class="mb-2">Email:</h4>
          <p>alugaqui@app.com</p>
        </div>

        <div class="phone mt-4">
          <i class="icon-phone"></i>
          <h4 class="mb-2">Terminal:</h4>
          <p>(+244) 945-006-657</p>
        </div>
      </div>
    </div>
    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
      <form action="{{ route('contatar.store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-6 mb-3">
            <input
              type="text"
              name="name"
              value="{{ old('name') }}"
              class="form-control"
              placeholder="Seu nome"
            />
          </div>
          <div class="col-6 mb-3">
            <input
              type="email"
              name="email"
              value="{{ old('email') }}"
              class="form-control"
              placeholder="Seu email"
            />
          </div>
          <div class="col-12 mb-3">
            <input
              type="text"
              name="assunto"
              value="{{ old('assunto') }}"
              class="form-control"
              placeholder="Assunto"
            />
          </div>
          <div class="col-12 mb-3">
            <textarea
              name="mensagem"
              id="mensagem"
              value="{{ old('mensagem') }}"
              cols="30"
              rows="7"
              class="form-control"
              placeholder="Mensagem"
            ></textarea>
          </div>

          <div class="col-12">
            <input
              type="submit"
              value="Enviar Mensagem"
              class="btn btn-primary"
            />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>



@endsection
