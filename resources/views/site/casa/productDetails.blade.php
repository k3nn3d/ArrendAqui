@extends('layouts.site.index')
@section('conteudo')
 <!--================Single Product Area =================-->
 <div
      class="hero page-inner overlay"
      style="background-image: url('{{ $casa->vc_path }}')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
				{{$casa->name}}
            </h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">
                  <a href="{{route('casas')}}">Casas</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  {{$casa->name}}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide" >
                <img style="height: 600px;" src="{{$casa->vc_path}}" alt="Image" class="img-fluid" />
                <img style="height: 600px;" src="{{$casa->vc_path}}" alt="Image" class="img-fluid" />
                <img style="height: 600px;" src="{{$casa->vc_path}}" alt="Image" class="img-fluid" />
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h2 class="heading text-primary">{{$casa->name}}</h2>
            <p class="meta"> {{$casa->municipio}}, {{$casa->provincia}} </p>
            <hr style="color:green">
            <h5>Preço</h5>
            
            <p class="text-black-50">
              {{$casa->preco}}kz/{{$casa->unidade_name}}
                  </p>
                  <hr>
           
            <h5>Quartos</h5>
            
            <p class="text-black-50">
              {{$casa->quartos}}
            </p>
            <hr>
            <h5>Casa de banho</h5>
            
            <p class="text-black-50">
              {{$casa->casa_de_banho}}
            </p>
            <hr>
            <h5>Cozinha</h5>
            
            <p class="text-black-50">
              {{$casa->cozinha}}
            </p>
            <hr>
            <h5>Sala</h5>
            
            <p class="text-black-50">
              {{$casa->sala}}
            </p>
            <hr>
            <h5>Descrição</h5>
            
            <p class="text-black-50">
				      {{$casa->descricao}}
            </p>
            
           
             @if($casa->plano==0)

             @else
             
            <div class="d-block agent-box p-5">
              <div class="img mb-4">
                <img
                  src="{{ $casa->foto_user }}"
                  alt="Image"
                  class="img-fluid"
                />
              </div>
              <div class="text">
                <h3 class="mb-0"> {{$casa->name_user}} {{$casa->lastname_user}}</h3>
                <div class="meta mb-3">Senhorio(a)</div>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ratione laborum quo quos omnis sed magnam id ducimus saepe
                </p>
                <ul class="list-unstyled  dark-hover d-flex">
                 
				 <li>
					<a href="{{ route('site.chat.index',$casa->user_id) }}" class="btn btn-primary text-white py-3 px-4"><i class="icon-massage"></i>Alugar</a>
				 </li>

                </ul>
              </div>
            </div>
          </div>
          @endif

        </div>
      </div>
    </div>

    

    <div class="section">
      <div class="container">
        <hr> 
        <div class="row mb-5 align-items-center" style="margin-top: 50px">
          <div class="col-lg-12">
            <h2 class="font-weight-bold text-primary heading" style="text-align: center">
              Casas em Destaque
            </h2>
          </div>
         
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                 @foreach ($casas_destaque as $casa)
                     
                 
                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="{{$casa->vc_path}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                  </a>
    
                  <div class="property-content">
                    <div class="price mb-2"><span>{{$casa->preco}}kz/{{$casa->unidade_name}}</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >{{$casa->name}}</span
                      >
                      <span class="city d-block mb-3">{{$casa->provincia}}, {{$casa->municipio}} </span>
    
                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">{{$casa->quartos}} quarto(s)</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption"> {{$casa->casa_de_banho}} casa(s) de banho</span>
                        </span>
                      </div>
    
    
                      <a
                        href="{{route('casa.show', $casa->id)}}"
                        class="btn btn-primary py-2 px-3"
                        >Ver detalhes</a
                      >
                    </div>
                  </div>
                </div>
                @endforeach
                <!-- .item -->
    
                              
              </div>
              @empty($casa)
              <p style="text-align: center">Sem Casas em Destaque</p>
              @endempty
              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Anterior</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Próximo</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
@endsection
