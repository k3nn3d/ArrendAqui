@extends('layouts.site.index')
@section('conteudo')
<div
class="hero page-inner overlay"
style="background-image: url('{{asset('tamplate/images/hero_bg_1.jpg')}}')"
>

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">Pagar Reserva de carro</h1>

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
          Pagar Reserva de carro
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>
<br>
<!--HEADER END-->



<div class="row " >
    

    
    <div class="col-3"></div>
    
    <div class="col-6">
    <div class="col-12 mb-3">
        <center>
        <h1>Pagar reserva</h1>
       </center>
        <hr>
      <form action="{{ route('user.pagar.pedido',$pedido->id) }}">
      <label for="">IBAN</label>
      <input
      type="text"
      name="iban"
      id="i"
      class="form-control"
      value="A060002229449848322909"
      readonly
      required
      />
  </div>
  <div class="col-12 mb-3">
    <label for="">Titular</label>
    <input
    type="text"
    name="titular"
    id="t"
    class="form-control"
    value="Administrador do Sistema"
    required
    readonly
    />
</div>
<div class="col-12 mb-3">
  <label for="">Valor a transferir(Akz)</label>
  <input
  type="text"
  name="valor"
  id="v"
  class="form-control"
  value="{{$pedido->preco}}"
  readonly

  />
</div>
<div class="col-12 mb-3">
  <label for="">Comprovativo</label>
  <input
  type="file"
  name="comprovativo"
  id="c"
  class="form-control"
  value=""
  required
  
  />
</form>
</div>

<button class="btn btn-success">
    Enviar
</button>



<div class="col-3"></div>

</div>
<br><br>






@endsection