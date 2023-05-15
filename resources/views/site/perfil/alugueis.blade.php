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
	  <h1 class="heading" data-aos="fade-up">Suas casas</h1>
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
			Suas casas
		  </li>
		</ol>
	  </nav>
	</div>

  </div>
</div>

</div>

<!--HEADER END-->


<!-- [ Main Content ] start -->
<div class="pcoded-main-container"  >
    <div class="pcoded-content" >
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        @if(Auth::user()->vc_tipo_utilizador==5)
        <div class="section">
            <div class="container">
              <div class="row mb-5 align-items-center">
               
                    <hr> 
                   
                    <div class="latest_product_inner">
                      <div class="row">
                        <div class="col-lg-12 mb-5" style="margin-top: 50px">
                          <h2 style="text-align: center" >
                            @if($nome ?? '')
                            Casas em "{{ $nome ?? '' }}"
                            @else
                            Reservas
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
                              <h6 class="d-block mb-2 text-black-50"
                                >{{$casa->aluguel_estado}}</h6
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
                            
          
                            @if($casa->aluguel_estado == 'Reservado')
                            <a
                            href="{{ route('site.chat.index',['id'=>$casa->aluguel_id_user,'id_casa'=>$casa->id]) }}"
                            class="btn btn-primary py-2 px-3"
                            >Mensagem</a
                          >
                            @else
                            <a
                            href="{{route('user.aluguel.update',$casa->aluguel_id)}}"
                            class="btn btn-primary py-2 px-3"
                            >Aceitar</a
                          >
                          @endif
                              @if(Route::has('login'))
                              @auth
                              @if($casa->id_user === Auth::user()->id && $casa->plano != 0)
                              <a
                              href="{{route('user.promover', $casa->id)}}"
                              class="btn btn-danger py-2 px-3"
                              >Recusar</a
                            >
                              @else
                              @if($casa->id_user === Auth::user()->id && $casa->plano == 0)
                              <a
                              href="{{route('user.promover', $casa->id)}}"
                              class="btn btn-success py-2 px-3"
                              >Promover</a
                            >
                            @else
                            @foreach($aluguels as $alu)
                            @if($alu->id_user==Auth::user()->id && $alu->id_casa== $casa->id )
                            <a
                            href="{{ route('user.aluguel.delete',$alu->id) }}"
                            class="btn btn-danger py-2 px-3"
                            >Cancelar reserva</a
                          >
                          @else
                          <a
                          href="{{ route('user.aluguel.store',$casa->id) }}"
                          class="btn btn-success py-2 px-3"
                          >Reservar</a
                        >
                           @endif
                  
                          @endforeach
                          @empty($alu)
                          <a
                            href="{{ route('user.aluguel.store',$casa->id) }}"
                            class="btn btn-success py-2 px-3"
                            >Reservar</a
                          >
                          @endempty
                         
                             @endif
                             @endif
                             @else
                             @foreach($aluguels as $alu)
                             @if($alu->id_user==Auth::user()->id && $alu->id_casa== $casa->id )
                             <a
                             href="{{ route('user.aluguel.delete',$alu->id) }}"
                             class="btn btn-danger py-2 px-3"
                             >Cancelar reserva</a
                           >
                           @else
                           <a
                           href="{{ route('user.aluguel.store',$casa->id) }}"
                           class="btn btn-success py-2 px-3"
                           >Reservar</a
                         >
                            @endif
                   
                           @endforeach
                           @empty($alu)
                           <a
                             href="{{ route('user.aluguel.store',$casa->id) }}"
                             class="btn btn-success py-2 px-3"
                             >Reservar</a
                           >
                           @endempty
                          
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
            @endif
            @if(Auth::user()->vc_tipo_utilizador==2)
            <div class="section">
                <div class="container">
                  <div class="row mb-5 align-items-center">
                   
                        <hr> 
                       
                        <div class="latest_product_inner">
                          <div class="row">
                            <div class="col-lg-12 mb-5" style="margin-top: 50px">
                              <h2 style="text-align: center" >
                                @if($nome ?? '')
                                Casas em "{{ $nome ?? '' }}"
                                @else
                                Reservas
                                @endif
                              </h2>
                            </div>
                            @foreach ($casas1 as $casa)
                                   
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="property-item">
                              <a href="property-single.html" class="img">
                                <img src="{{$casa->vc_path}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
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
                                  <h6 class="d-block mb-2 text-black-50"
                                    >{{$casa->aluguel_estado}}</h6
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
                                
              
                                @if($casa->aluguel_estado == 'Reservado')
                                <a
                                href="{{ route('site.chat.index',['id'=>$casa->id_user,'id_casa'=>$casa->id]) }}"
                                class="btn btn-primary py-2 px-3"
                                >Mensagem</a
                              >
                                @else
                               
                              @endif
                                  @if(Route::has('login'))
                                  @auth
                                  @if($casa->id_user === Auth::user()->id && $casa->plano != 0)
                                  <a
                                  href="{{route('user.promover', $casa->id)}}"
                                  class="btn btn-danger py-2 px-3"
                                  >Recusar</a
                                >
                                  @else
                                  @if($casa->id_user === Auth::user()->id && $casa->plano == 0)
                                  <a
                                  href="{{route('user.promover', $casa->id)}}"
                                  class="btn btn-success py-2 px-3"
                                  >Promover</a
                                >
                                @else
                                @foreach($aluguels as $alu)
                                @if($alu->id_user==Auth::user()->id && $alu->id_casa== $casa->id )
                                <a
                                href="{{ route('user.aluguel.delete',$alu->id) }}"
                                class="btn btn-danger py-2 px-3"
                                >Cancelar reserva</a
                              >
                              @else
                              <a
                              href="{{ route('user.aluguel.store',$casa->id) }}"
                              class="btn btn-success py-2 px-3"
                              >Reservar</a
                            >
                               @endif
                      
                              @endforeach
                              @empty($alu)
                              <a
                                href="{{ route('user.aluguel.store',$casa->id) }}"
                                class="btn btn-success py-2 px-3"
                                >Reservar</a
                              >
                              @endempty
                             
                                 @endif
                                 @endif
                                 @else
                                 @foreach($aluguels as $alu)
                                 @if($alu->id_user==Auth::user()->id && $alu->id_casa== $casa->id )
                                 <a
                                 href="{{ route('user.aluguel.delete',$alu->id) }}"
                                 class="btn btn-danger py-2 px-3"
                                 >Cancelar reserva</a
                               >
                               @else
                               <a
                               href="{{ route('user.aluguel.store',$casa->id) }}"
                               class="btn btn-success py-2 px-3"
                               >Reservar</a
                             >
                                @endif
                       
                               @endforeach
                               @empty($alu)
                               <a
                                 href="{{ route('user.aluguel.store',$casa->id) }}"
                                 class="btn btn-success py-2 px-3"
                                 >Reservar</a
                               >
                               @endempty
                              
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
            @endif


                                  <!--================End Category Product Area =================-->
          <!--Google maps-->
          <div style="width: 100%; height:600px">
            <div id="map"></div>
          </div>
          <!--Google maps end-->
          
  <!-- [ Main Content ] end -->
  
@endsection