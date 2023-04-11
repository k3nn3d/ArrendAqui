
@extends('layouts.site.index')
@section('conteudo')

<!--HEADER START-->
<div class="hero">
  <div class="hero-slide">
    @if (Route::has('login'))
      @auth
      <div
        class="img overlay"
        style="background-image: url('tamplate/images/hero_bg_2.jpg')"
      ></div>
      @endauth
      @endif

      <div
        class="img overlay"
        style="background-image: url('tamplate/images/hero_bg_3.jpg')"
      ></div>
      <div
        class="img overlay"
        style="background-image: url('tamplate/images/hero_bg_2.jpg')"
      ></div>
      <div
        class="img overlay"
        style="background-image: url('tamplate/images/hero_bg_1.jpg')"
      ></div>
    
    
  </div>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center">
        <h1 class="heading" data-aos="fade-up">
          Procure um imóvel perto de si
        </h1>
        <form
          action="{{ route('casas') }}"
          class="narrow-w form-search d-flex align-items-stretch mb-3"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          <input
            type="text"
            class="form-control px-4"
            placeholder="Província, Município..."
            id="pesquisa"
            name="pesquisa"
          />
          <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--HEADER END-->


    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Casas em Destaque
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a
                href="{{route('casas')}}"
                target="_blank"
                class="btn btn-primary text-white py-3 px-4"
                >Ver todas as Casas</a
              >
            </p>
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
                      @if($casa->plano != 0)
                      <div style="padding: 0.4rem 0.5rem">
                          <i class="icon-star text-warning"></i>  Patrocinado
                      </div>
                      @endif

                      <a
                        href="{{route('casa.show', $casa->id)}}"
                        class="btn btn-primary py-2 px-3"
                        >Ver detalhes</a
                      >
                    
                    @auth
                    @if($casa->id_user === Auth::user()->id)
                    <a
                    href="{{route('user.promover', $casa->id)}}"
                    class="btn btn-warning py-2 px-3"
                    >Editar</a
                  >
                  @else
                  <a
                  href="{{ route('site.chat.index',$casa->user_id) }}"
                  class="btn btn-success py-2 px-3"
                  >Mensagem</a
                >
                  @endif
                  @else
                  <a
                  href="{{ route('site.chat.index',$casa->user_id) }}"
                  class="btn btn-success py-2 px-3"
                  >Mensagem</a
                >
                  @endauth
                  
                

                 
                 
                
                 
                    </div>
                  </div>
                </div>



                
                @endforeach
               
                <!-- .item -->

                              
              </div>
              @empty($casa)
              <p style="text-align: center">Sem Casas em Destaque</p>
              @endempty


              <!--MODAL PARA O CHAT-->
              <!--MODAL-->



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

    <section class="features-1">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <span class="flaticon-house"></span>
              <h3 class="mb-3">Alugue uma casa com facilidade</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Saiba mais</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature">
              <span class="flaticon-building"></span>
              <h3 class="mb-3">Propriedades para arrendar</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Saiba mais</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature">
              <span class="flaticon-house-3"></span>
              <h3 class="mb-3">Senhorios de confiança</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Saiba mais</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature">
              <span class="flaticon-house-1"></span>
              <h3 class="mb-3">Ponha uma casa para alugar</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Saiba mais</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Veja o que nossos clientes dizem
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Anterior</span>

              <span class="next" data-controls="next">Próximo</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
            @foreach($comentarios as $comment)
            <div class="item">
              <div class="testimonial">
                <img
                  src="{{ $comment->foto_user }}"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  @for($i=0; $i<$comment->estrelas; $i++)
                  <span class="icon-star text-warning"></span>
                  
                  @endfor
                 
                </div>
                <h3 class="h5 text-primary mb-4">{{ $comment->name_user }} {{ $comment->lastname_user }}</h3>
                <blockquote>
                  <p>
                    &ldquo;{{ $comment->conteudo }}&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">
                  @if($comment->tipo==6)
                  Cliente
                  @endif
                  @if($comment->tipo==5)
                  Senhorio
                  @endif
                </p>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>

    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
                Bora encontrar uma casa para si!
            </h2>
            <p class="text-black-50">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
              enim pariatur similique debitis vel nisi qui reprehenderit.
            </p>
          </div>
        </div>
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="tamplate/images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-home2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Encontre Uma Casa Com Facilidade</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-person"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Senhorios de Confiança</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-security"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Fácil e Seguro</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row section-counter mt-5">
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">{{$num_casas_alugadas}}</span></span
              >
              <span class="caption text-black-50">de Casas alugadas</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">{{$num_casas_para_aluguel}}</span></span
              >
              <span class="caption text-black-50">de Casas disponíveis para aluguel</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">{{$num_casas}}</span></span
              >
              <span class="caption text-black-50">de todas as Casas</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">{{$num_senhorio}}</span></span
              >
              <span class="caption text-black-50">de Senhorios</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4">Junte-se à nós e ganhe dinheiro!</h2>
          <p>
            <a
              href="{{ route('motorista.create') }}"
              target="_blank"
              class="btn btn-primary text-white py-3 px-4"
              >Tornar-se motorista</a
            >
          </p>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
    </div>

    <div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-6 mb-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              Nossa Equipa
            </h2>
            <p class="text-black-50">
              Aqui serão apresentadas as entidades pelas 
              quais foi possível o projecto existir.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6 mb-5 mb-lg-0">
            <div class="h-100 person">
              <img
                style="width: 95px; height:95px"
                src="tamplate/images/person22.jpg"
                alt="Image"
                class="img-fluid"
              />

              <div class="person-contents">
                <h2 class="mb-0"><a href="#">Donilson Da Costa</a></h2>
                <span class="meta d-block mb-3">Designer, Founder</span>
                <p>
                  Estudante do 13º ano no Instituto de Telecomunicações(ITEL)
                  Desenvolvedor Front-end
                  
                </p>

                <ul class="social list-unstyled list-inline dark-hover">
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-6 col-lg-6 mb-5 mb-lg-0">
            <div class="h-100 person">
              <img
                src="tamplate/images/person11.jpg"
                alt="Image"
                class="img-fluid"
              />

              <div class="person-contents">
                <h2 class="mb-0"><a href="#">Terêncio Gaspar</a></h2>
                <span class="meta d-block mb-3">Designer, Co-fouder</span>
                <p>
                  Estudante do 13º ano no Instituto de Telecomunicações(ITEL)
                  Desenvolvedor Back-end
                </p>

                <ul class="social list-unstyled list-inline dark-hover">
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
@if(session('cadastrada'))
  
  <script type="text/javascript">
    
    Swal.fire(
    'Parabéns!',
    'Sua conta foi criada com sucesso',
    'success'
  )
  </script>
@endif


  
@endsection


