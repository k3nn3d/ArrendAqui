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
      <h1 class="heading" data-aos="fade-up">Casas</h1>

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
            Casas
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>

<!--HEADER END-->


  <!--================Category Product Area =================-->
  <section class="cat_product_area section_gap">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-12">
          <div class="product_top_bar">
            <div class="left_dorp">

  <div class="container" style="margin-top: 100px">
    <div style="display: flex; justify-content:center" class="mb-5">  <a href="" class="btn btn-primary">Condomínio</a> <a href="" class="btn btn-warning">Apartamento</a> <a href="" class="btn btn-primary">Triplex</a> <a href="" class="btn btn-warning">Centralidade</a>  </div>
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center">
        <h1 class="heading mb-4" data-aos="fade-up" >
          Procure um imóvel perto de si
        </h1>
        <form
        action="{{ route('casas') }}"
        class="narrow-w form-search d-flex align-items-stretch mb-5"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <input
          type="text"
          class="form-control px-4"
          style="border-radius: 25px; margin-right:5px"
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

<div class="section">
  <div class="container">
    <div class="row mb-5 align-items-center">
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

            {{--<form action="" class="narrow-w form-search d-flex align-items-stretch mb-3">
              @csrf
              <div class="row">
           <div class="col-6">
            <select name="" id="">
              <option value="" class="form-control px-4">Selecione uma Categoria</option>

                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"> {{ $categoria->name }} </option>
                @endforeach
             </select>
           </div>
            
           <div class="col-6">
           <select name="" id="">
            <option value="">Selecione uma subcategoria</option>
            @foreach ($sub_categorias as $sub_categoria)
            <option value="{{ $sub_categoria->id }}"> {{ $sub_categoria->name }} </option>
            @endforeach
           
           </select>
           </div>
          </div>
             </form>
            </div>
          </div>
          --}}
          <hr> 
          
          <div class="latest_product_inner">
            <div class="row">
              <div class="col-lg-12 mb-5" style="margin-top: 50px">
                <h2 style="text-align: center" >
                  @if($nome ?? '')
                  Casas em "{{ $nome ?? '' }}"
                  @else
                  Todas as Casas
                  @endif
                </h2>
              </div>
              @foreach ($casas as $casa)
                     
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
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
                    @else
                    <div style="padding: 0.4rem 0.5rem">
                      <i class="icon-star text-success"></i>  Disponível
                    </div>
                    @endif
                  

                    <a
                      href="{{route('casa.show', $casa->id)}}"
                      class="btn btn-primary py-2 px-3"
                      >Ver detalhes</a
                    >
                    @if(Route::has('login'))
                    @auth
                    @if($casa->id_user === Auth::user()->id && $casa->plano != 0)
                    <a
                    href="{{route('user.promover', $casa->id)}}"
                    class="btn btn-warning py-2 px-3"
                    >Editar</a
                  >
                    @else
                    @if($casa->id_user === Auth::user()->id && $casa->plano == 0)
                    <a
                    href="{{route('user.promover', $casa->id)}}"
                    class="btn btn-success py-2 px-3"
                    >Promover</a
                  >
                  @else
                  <a
                  href="{{ route('site.chat.index',$casa->user_id) }}"
                  class="btn btn-success py-2 px-3"
                  >Mensagem</a
                >
                   @endif
                   @endif
                   @else
                   <a
                   href="{{ route('site.chat.index',$casa->user_id) }}"
                   class="btn btn-success py-2 px-3"
                   >Mensagem</a
                 >
                  @endauth
                 
                  @endif
                  </div>
                </div>
              </div>
            </div>
          
           
              @endforeach
            {{--  {{$casas->toJson()}} --}}
              @empty($casa)
              
            
                <div class="container mb-5" style="margin-top: 10px;" >
                  <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 text-center">
                      <h5 class="" data-aos="fade-up" >
                        Nenhum item corresponde à pesquisa
                      </h5>
                      <img src="" alt="">
                    </div>
                  </div>
                </div>  
              @endempty
                           
            </div>
          </div>
        </div>

                </div>
        </div>
      </div>
    </div>
  </section>
                        <!--================End Category Product Area =================-->






        
@if(session('editada'))

<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Informações editadas com sucesso',
  'success'
)
</script>
@endif
@if(session('editada_f'))
      
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao editar informações',
  'error'
)
</script>
@endif
@if(session('cadastrada'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Casa cadastrada com sucesso',
  'success'
)
</script>
@endif
@if(session('cadastrada_f'))
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao cadastrar casa',
  'error'
)
</script>
@endif
@if(session('eliminada'))
      
<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Casa eliminada com sucesso',
  'success'
)
</script>
@endif
@if(session('editada_f'))
      
<script type="text/javascript">
  
  Swal.fire(
  'ERRO',
  'Erro ao eliminar casa',
  'error'
)
</script>
@endif
                        

@endsection
