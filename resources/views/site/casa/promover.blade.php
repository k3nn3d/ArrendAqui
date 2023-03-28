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
      <h1 class="heading" data-aos="fade-up">Promover Casa: </h1>

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
          Pôr em Aluguel
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
      <h2 style="text-align: center" class="mb-5" data-aos="fade-up" data-aos-delay="200">Escolha um plano de divulgação</h2>
      <div class="col-lg-2">

      </div>
      
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <form action="{{route('user.casa.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="row">




                   
                    <div class="col-lg-4 mb-3">   
                    <input type="radio" id="plano1" name="plano" value="1" placeholder="Plano">
                    <label for="plano1">
                      <div class="btn btn-success">
                        <h4 style="text-align: center">Plano 1</h4>
                        <div>
                          <ul>
                            <li>Plano1.1</li>
                          </ul>
                          <p>Sua casa será divulgada durante 1mês</p>
                          <p>Preço: 1.000kz</p>
                        </div>
                      </div>
                  </label>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <input type="radio" id="plano2" name="plano" value="2" placeholder="Plano">
                    <label for="plano2">
                      <div class="btn btn-warning" >
                        <h4 style="text-align: center">Plano 2</h4>
                        <div>
                          <ul>
                            <li>Plano2.1</li>
                          </ul>
                          <p>Sua casa será divulgada durante 2meses</p>
                          <p>Preço: 2.000kz</p>
                        </div>
                      </div>
                  </label>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <input type="radio" id="plano3" name="plano" value="3" placeholder="Plano">
                    <label for="plano3">
                      <div class="btn btn-primary" for="plano3" style="">
                        <h4 style="text-align: center">Plano 3</h4>
                        <div>
                          <ul>
                            <li>Plano3.1</li>
                          </ul>
                          <p>Sua casa será divulgada durante 3meses</p>
                          <p>Preço: 3.000kz</p>
                        </div>
                      </div>
                  </label>
                  </div>
                
                  
                      <button type="submit" class="btn btn-success">Ativar plano</button>
                   
                  </div> 
                     
              </form>
            </div>
          </div>
        </div>    
      </div>  

<!--EXCESSO-->

 

 
   

@endsection