@extends('layouts.site.index')
@section('conteudo')

<!--HEADER START-->
<div
class="hero page-inner overlay"
style="background-image: url('{{asset('tamplate/images/hero_bg_1.jpg')}}')"
>

<div class="container">
  <div class="row justify-content-center align-items-center">
	<div class="col-lg-9 text-center mt-5">
	  <h1 class="heading" data-aos="fade-up">Reservas de carros</h1>
	  <nav
		aria-label="breadcrumb"
		data-aos="fade-up"
		data-aos-delay="200"
	  >
		<ol class="breadcrumb text-center justify-content-center">
		  <li class="breadcrumb-item"><a href="{{route('user.user.perfil',Auth::user()->id)}}">Perfil</a></li>
		  <li
			class="breadcrumb-item active text-white-50"
			aria-current="page"
		  >
			Reservas de carros
		  </li>
		</ol>
	  </nav>
	</div>

  </div>
</div>

</div>

<!--HEADER END-->


<!-- [ Main Content ] start -->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        @if(Auth::user()->vc_tipo_utilizador==6)
        <div class="section">
            <div class="container">
              <div class="row mb-5 align-items-center">
               
                   
                    <div class="latest_product_inner">
                      <div class="row">
                        <div class="col-lg-12 mb-5" style="margin-top: 50px">
                          <h2 style="text-align: center" >
                            Reservas de carros
                            <hr> 
                          </h2>
                        </div>
                        @foreach ($pedidos as $pedido)
                               
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="property-item">
                          <a href="property-single.html" class="img">
                            <img src="{{asset($pedido->foto)}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                          </a>
          
                          <div class="property-content">
                            <div class="price mb-2"><span>{{$pedido->preco}}kz</span></div>
                            @if($pedido->id_carro)
                            <div>
                                <h5>Motorista:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$pedido->user_name}} {{$pedido->lastname_user}}</h6
                              >
                              @endif
                              <h5>Preço:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$pedido->preco}}kz</h6
                              >
                              <h5>Data:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$pedido->data}}</h6
                              >
                              <h5>Hora:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$pedido->hora}}</h6
                              >
                              <h5>Estado:</h5>
                              <h6 class="d-block mb-2  @if($pedido->estado == 'Recusado')btn btn-danger @endif  @if($pedido->estado == 'Reservado')btn btn-success @endif  @if($pedido->estado == 'Pendente')btn btn-warning @endif" 
                                >{{$pedido->estado}}</h6
                              >
                              <h5>Desnitno:</h5>
                              <span class="city d-block">{{$pedido->provincia}}, {{$pedido->municipio}}, {{$pedido->bairro}} </span>
                            
                             
                            
          
                              @if($pedido->estado == 'Reservado')
                            <a
                            href="{{ route('site.chat.index',['id'=>$pedido->id_user,'id_casa'=>$pedido->id]) }}"
                            class="btn btn-primary py-2 px-3"
                            >Mensagem</a
                          >
                 
                            @else
                            @if($pedido->estado != 'Recusado')
                            <a
                            href="{{route('user.aluguel.update',$pedido->id)}}"
                            class="btn btn-primary py-2 px-3"
                            >Ver</a
                          >
                          @endif
                          @endif
                              @if(Route::has('login'))
                              @auth
                              @if($pedido->estado != 'Recusado' && $pedido->estado !='Reservado')
                              <a
                              href="{{route('user.aluguel.recusar',$pedido->id)}}"
                              class="btn btn-danger py-2 px-3"
                              >Cancelar</a
                            >
                              @else
                           

                          
                            @endauth
                            @endif
                            @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    
                     
                        @endforeach
                      {{--  {{$pedidos->toJson()}} --}}
                        @empty($pedido)
                        
                      
                          <div class="container mb-5" style="margin-top: 10px;" >
                            <div class="row justify-content-center align-items-center">
                              <div class="col-lg-6 text-center">
                                <h5 class="" data-aos="fade-up" >
                                  Não há reservas
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
            @endif
          

  @if(session('reservado'))

<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'pedido reservada com sucesso. Você será notificado caso o senhorio confirme sua reserva',
  'success'
)
</script>
@endif


@if(session('recusado'))

<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Reserva recusada',
  'success'
)
</script>
@endif


  
@endsection