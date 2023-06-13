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
	  <h1 class="heading" data-aos="fade-up">Seus Carros</h1>
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
			Seus carros
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
                            <h5 class="m-b-10"></h5>
                        </div>
                        <ul class="breadcrumb">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="section">
            <div class="container">
              <div class="row mb-5 align-items-center">
               
                    <hr> 
                   
                    <div class="latest_product_inner">
                      <div class="row">
                        <div class="col-lg-12 mb-5" style="margin-top: 50px">
                          <h2 style="text-align: center" >
                        
                            
                            Seus Carros
                            
                          </h2>
                        </div>
                        @foreach ($carros as $carro)
                               
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="property-item">
                          <a href="property-single.html" class="img">
                            <img src="{{asset($carro->vc_path)}}" alt="Image" class="img-fluid" style="width: 600px; height:300px" />
                          </a>
          
                          <div class="property-content">
                            <div class="price mb-2"><span>{{$carro->preco}}kz/m</span></div>
                            <div>
                               
                              <span class="city d-block mb-3">{{$carro->marca}} {{$carro->modelo}} </span>
          
                              <div class="specs d-flex mb-4">
                                <span class="d-block d-flex align-items-center me-3">
                                  <span class="icon-bed me-2"></span>
                                  <span class="caption">{{$carro->lugares}} Lugares</span>
                                </span>
                                <span class="d-block d-flex align-items-center">
                                  <span class="icon-bath me-2"></span>
                                  <span class="caption"> {{$carro->espaco}} m²</span>
                                </span>
                                
                              </div>
                              <hr>
                              <a href="" class="btn btn-success">Detalhes</a>
                              <a href="" class="btn btn-warning">Editar</a>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    
                     
                        @endforeach
                      {{--  {{$carros->toJson()}} --}}
                        @empty($carro)
                        
                      
                          <div class="container mb-5" style="margin-top: 10px;" >
                            <div class="row justify-content-center align-items-center">
                              <div class="col-lg-6 text-center">
                                <h5 class="" data-aos="fade-up" >
                                  Nenhum carro...
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
       
  <!-- [ Main Content ] end -->
  
@endsection