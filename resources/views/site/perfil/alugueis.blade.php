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
	  <h1 class="heading" data-aos="fade-up">
      @if(Auth::user()->vc_tipo_utilizador == 3)
      Pedidos
      @else
			Suas Reservas
      @endif
    </h1>
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
      @if(Auth::user()->vc_tipo_utilizador == 3)
      Pedidos
      @else
			Suas Reservas
      @endif
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

        @if(Auth::user()->vc_tipo_utilizador==3)
        <div class="section">
          <div class="container">
            <div class="row mb-5 align-items-center">
             
                 
                  <div class="latest_product_inner">
                    <div class="row">
                      <div class="col-lg-12 mb-5" style="margin-top: 50px">
                        <h2 style="text-align: center" >
                          Pedidos
                          <hr> 
                        </h2>
                      </div>
                      @foreach ($pedidos as $pedido)
                             
                      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                      <div class="property-item">
                        <a href="{{ route('user.pedido.ver',$pedido->id)}}" class="img">
                          <img src="{{asset($pedido->vc_path)}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                        </a>
        
                        <div class="property-content">
                          <div class="price mb-2"><span>{{$pedido->preco}}</span></div>
                          <div>
                              <h5>Cliente:</h5>
                            <h6 class="d-block mb-2 text-black-50"
                              >{{$pedido->user_name}} {{$pedido->lastname_user}}</h6
                            >
                            <h5>Preco:</h5>
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
                            <a
                          href="{{ route('user.pedido.ver',$pedido->id)}}"
                          class="btn btn-primary py-2 px-3"
                          >Ver</a
                        >
                            @if($pedido->estado == 'Reservado')
                          <a
                          href="{{ route('site.chat.index',['id'=>$pedido->id_user,'id_casa'=>$pedido->id]) }}"
                          class="btn btn-primary py-2 px-3"
                          >Mensagem</a
                        >
                          
                          @else
                          @if($pedido->aluguel_estado != 'Recusado')
                          <a
                          href="{{route('user.pedido.aceitar',$pedido->id)}}"
                          class="btn btn-primary py-2 px-3"
                          >Aceitar</a
                        >
                        @endif
                        @endif
                            @if(Route::has('login'))
                            @auth
                            @if($pedido->estado != 'Recusado' && $pedido->estado !='Reservado')
                            <a
                            href="{{route('user.aluguel.recusar',$pedido->id)}}"
                            class="btn btn-danger py-2 px-3"
                            >Recusar</a
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
                    {{--  {{$casas->toJson()}} --}}
                      @empty($pedido)
                      
                    
                        <div class="container mb-5" style="margin-top: 10px;" >
                          <div class="row justify-content-center align-items-center">
                            <div class="col-lg-6 text-center">
                              <h5 class="" data-aos="fade-up" >
                                Não há pedidos
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
        @if(Auth::user()->vc_tipo_utilizador==5)
        <div class="section">
            <div class="container">
              <div class="row mb-5 align-items-center">
               
                   
                    <div class="latest_product_inner">
                      <div class="row">
                        <div class="col-lg-12 mb-5" style="margin-top: 50px">
                          <h2 style="text-align: center" >
                            Reservas
                            <hr> 
                          </h2>
                        </div>
                        @foreach ($casas as $casa)
                               
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="property-item">
                          <a href="property-single.html" class="img">
                            <img src="{{asset($casa->vc_path)}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                          </a>
          
                          <div class="property-content">
                            <div class="price mb-2"><span>{{$casa->preco}}kz/{{$casa->unidade_name}}</span></div>
                            <div>
                                <h5>Cliente:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$casa->user_name}} {{$casa->lastname_user}}</h6
                              >
                              <h5>Proposta:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$casa->preco}}kz/{{$casa->unidade_name}}</h6
                              >
                              <h5>Data:</h5>
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$casa->aluguel_data}}</h6
                              >
                              <h5>Estado:</h5>
                              <h6 class="d-block mb-2  @if($casa->aluguel_estado == 'Recusado')btn btn-danger @endif  @if($casa->aluguel_estado == 'Reservado')btn btn-success @endif  @if($casa->aluguel_estado == 'Pendente')btn btn-warning @endif" 
                                >{{$casa->aluguel_estado}}</h6
                              >
                              <span class="city d-block">{{$casa->provincia}}, {{$casa->municipio}} </span>
                              <span class="mb-3">{{$casa->cat_name}}</span>
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
                            href="{{ route('site.chat.index',['id'=>$casa->aluguel_id_user,'id_casa'=>$casa->id]) }}"
                            class="btn btn-primary py-2 px-3"
                            >Mensagem</a
                          >
                            @if($casa->aluguel_estado == 'Reservado')
                            @else
                            @if($casa->aluguel_estado != 'Recusado')
                            <a
                            href="{{route('user.aluguel.update',$casa->aluguel_id)}}"
                            class="btn btn-primary py-2 px-3"
                            >Aceitar</a
                          >
                          @endif
                          @endif
                              @if(Route::has('login'))
                              @auth
                              @if($casa->aluguel_estado != 'Recusado' && $casa->aluguel_estado !='Reservado')
                              <a
                              href="{{route('user.aluguel.recusar',$casa->aluguel_id)}}"
                              class="btn btn-danger py-2 px-3"
                              >Recusar</a
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
                      {{--  {{$casas->toJson()}} --}}
                        @empty($casa)
                        
                      
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
            @if(Auth::user()->vc_tipo_utilizador==6)
            <div class="section">
                <div class="container">
                  <div class="row mb-5 align-items-center">
                   
                      
                       
                        <div class="latest_product_inner">
                          <div class="row">
                            <div class="col-lg-12 mb-5" style="margin-top: 50px">
                              <h2 style="text-align: center" >
                              
                                Reservas
                                <hr> 
                               
                              </h2>
                            </div>
                            @foreach ($casas1 as $casa)
                                   
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="property-item">
                              <a href="property-single.html" class="img">
                                <img src="{{asset($casa->vc_path)}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                              </a>
              
                              <div class="property-content">
                                <div class="price mb-2"><span>{{$casa->preco}}kz/{{$casa->unidade_name}}</span></div>
                                <div>
                                    <h5>Senhorio:</h5>
                                  <h6 class="d-block mb-2 text-black-50"
                                    >{{$casa->user_name}} {{$casa->lastname_user}}</h6
                                  >
                                  <h5>Proposta:</h5>
                                  <h6 class="d-block mb-2 text-black-50"
                                    >{{$casa->preco}}kz/{{$casa->unidade_name}}</h6
                                  >
                                  <h5>Data:</h5>
                                  <h6 class="d-block mb-2 text-black-50"
                                    >{{$casa->aluguel_data}}</h6
                                  >
                                  <h5>Estado:</h5>
                                  <h6 class="d-block mb-2 @if($casa->aluguel_estado == 'Recusado')btn btn-danger @endif  @if($casa->aluguel_estado == 'Reservado')btn btn-success @endif  @if($casa->aluguel_estado == 'Pendente')btn btn-warning @endif"
                                    >{{$casa->aluguel_estado}}</h6
                                  >
                                  <span class="city d-block ">{{$casa->provincia}}, {{$casa->municipio}}, {{$casa->bairro}} </span>
                                  <span class="mb-3">{{$casa->cat_name}}</span>
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
                                href="{{ route('site.chat.index',['id'=>$casa->id_user,'id_casa'=>$casa->id]) }}"
                                class="btn btn-primary py-2 px-3"
                                >Mensagem</a
                              >
                              @if($casa->aluguel_estado == 'Reservado')
                              @else
                               
                              @endif
                              @if(Route::has('login'))
                              @auth
                              @if($casa->id_user === Auth::user()->id && $casa->plano != 'free')
                              <a
                              href="{{route('user.promover', $casa->id)}}"
                              class="btn btn-warning py-2 px-3"
                              >Editar</a
                            >
                              @else
                              @if($casa->id_user === Auth::user()->id && $casa->plano == 'free')
                              <a
                              href="{{route('user.promover', $casa->id)}}"
                              class="btn btn-success py-2 px-3"
                              >Promover</a
                            >
                            @else
                            @if($casa->reserva->where('id_user',Auth::user()->id)->isNotEmpty())
                           @if($casa->reserva->where('id_user', Auth::user()->id)->first()->estado =='Pendente')
                            <a href="{{ route('user.aluguel.delete', $casa->reserva->where('id_user', Auth::user()->id)->first()->id) }}"
                               class="btn btn-danger py-2 px-3">Cancelar reserva
                              </a>
                              @else
                             
                              @endif
                        
                          @else
                         
                          <a
                          href="{{ route('user.aluguel.store',$casa->id) }}"
                          class="btn btn-success py-2 px-3"
                          >Reservar</a
                        >
                        @endif
                           
                             @endif
                             @endif
                            @endauth
                           
                            @endif  </div>
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
                                      Não há reservas...
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


                                  <!--================End Category Product Area =================-->
          <!--Google maps-->
          <div style="width: 100%; height:600px">
            <div id="map"></div>
          </div>
          <!--Google maps end-->
          
  <!-- [ Main Content ] end -->


  @if(session('reservado'))

<script type="text/javascript">
  
  Swal.fire(
  'SUCESSO',
  'Casa reservada com sucesso. Você será notificado caso o senhorio confirme sua reserva',
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