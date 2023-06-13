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
        <img src="{{asset(Auth::user()->vc_path)}}" alt="user" style="border-radius: 70px; height:120px; width:120px">
       <h1 class="heading" data-aos="fade-up">{{Auth::user()->name}} {{Auth::user()->lastname}}</h1>
       <span style="color:#fff; font-size: 0.9rem; font-weight:500">@_{{Auth::user()->username}}</span>
 
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
             Painel
           </li>
         </ol>
       </nav>
       <a href="{{ route('user.user.perfil',Auth::user()->id) }}" class="btn-success" style="padding:0.8rem; border-radius:20px">Perfil</a>
     </div>

   </div>
 </div>
 
 </div>
 
 <!--HEADER END-->
 
 
<!-- [ Main Content ] start -->
<div class="pcoded-main-container" style="margin-bottom: 2rem" >
  <div class="pcoded-content" >
      <!-- [ breadcrumb ] start -->
      <div class="page-header" style="padding: 1.5rem">
          <div class="page-block">
              <div class="row align-items-center">
                  <div class="col-md-12">
                     
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-user"></i></a></li>
                          <li class="breadcrumb-item"><a href="#!">@switch(Auth::user()->vc_tipo_utilizador)
                              @case(1)
                                  Administrador
                                  @break
                              @case(2)
                                  Gerente
                                  @break
                              @case(3)
                                    Motorista
                              @break
                              @case(4)
                                  Afiliado/(desanbilitado)
                              @break
                              @case(5)
                                  Senhorio
                              @break
                              @case(6)
                                  Cliente
                              @break
                              @default
                                Usuário Indefinido 
                          @endswitch</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row" style="padding-left: 1.5rem; padding-right: 1.5rem;  ">
          
         

        
        <!-- seo start -->
       {{-- <div class="col-xl-4 col-md-12" style="margin-bottom: 1.5rem">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center">
                      <div class="col-6">
                          <h3>3</h3>
                          <h6 class="text-muted m-b-0">Carros</h6>
                      </div>
                      <div class="col-6">
                          <div id="#" class="d-flex align-items-end"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>--}}
      <div class="col-xl-4 col-md-6" style="margin-bottom: 1.5rem">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center">
                      <div class="col-6">
                          <h3>@switch(Auth::user()->vc_tipo_utilizador)
                            @case(6)
                                {{ $arrendamento_sen }}
                                @break
                            @case(5)
                            {{ $arrendamento_cli }}
                                @break
                                @case(3)
                                {{ $arrendamento_mot }}
                                @break
                                
                            @default
                            0
                                
                        @endswitch</h3>
                          <h6 class="text-muted m-b-0">@if(Auth::user()->vc_tipo_utilizador==3)Reservas @else Arrendamentos @endif</h6>
                      </div>
                      <div class="col-6">
                          <div id="#" class="d-flex align-items-end"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @if(Auth::user()->vc_tipo_utilizador ==5)
      <div class="col-xl-4 col-md-6" style="margin-bottom: 1.5rem">
          <div class="card">
              <div class="card-body">
                  <div class="row align-items-center">
                      <div class="col-6">
                          <h3>{{ $casas }}</h3>
                          <h6 class="text-muted m-b-0">Casas</h6>
                      </div>
                      <div class="col-6">
                          <div id="#" class="d-flex align-items-end"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @endif

        @if(Auth::user()->vc_tipo_utilizador ==6)
          <div class="col-xl-4 col-md-12" style="margin-bottom: 1.5rem">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-6">
                              <h3>{{Auth::user()->pontos}}</h3>
                              <h6 class="text-muted m-b-0">Pontos</h6>
                          </div>
                          <div class="col-6">
                              <div id="#" class="d-flex align-items-end"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        @endif
          <div class="col-xl-4 col-md-6" style="margin-bottom: 1.5rem">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-6">
                              <h3>{{$chat}}</h3>
                              <h6 class="text-muted m-b-0">Conversas</h6>
                          </div>
                          <div class="col-6">
                              <div id="#" class="d-flex align-items-end"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        @if(Auth::user()->vc_tipo_utilizador ==3)
          <div class="col-xl-4 col-md-6" style="margin-bottom: 1.5rem">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-6">
                              <h3>{{$carros}}</h3>
                              <h6 class="text-muted m-b-0">Carros</h6>
                          </div>
                          <div class="col-6">
                              <div id="#" class="d-flex align-items-end"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endif
          <!-- seo end -->

        
      </div>
      <!-- [ Main Content ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->
  <!-- Warning Section start -->
  <!-- Older IE warning message -->
  <!--[if lt IE 11]>
      <div class="ie-warning">
          <h1>Warning!!</h1>
          <p>You are using an outdated version of Internet Explorer, please upgrade
              <br/>to any of the following web browsers to access this website.
          </p>
          <div class="iew-container">
              <ul class="iew-download">
                  <li>
                      <a href="http://www.google.com/chrome/">
                          <img src="assets/images/browser/chrome.png" alt="Chrome">
                          <div>Chrome</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.mozilla.org/en-US/firefox/new/">
                          <img src="assets/images/browser/firefox.png" alt="Firefox">
                          <div>Firefox</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://www.opera.com">
                          <img src="assets/images/browser/opera.png" alt="Opera">
                          <div>Opera</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.apple.com/safari/">
                          <img src="assets/images/browser/safari.png" alt="Safari">
                          <div>Safari</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                          <img src="assets/images/browser/ie.png" alt="">
                          <div>IE (11 & above)</div>
                      </a>
                  </li>
              </ul>
          </div>
          <p>Sorry for the inconvenience!</p>
      </div>
  <![endif]-->
  <!-- Warning Section Ends -->
    
      
    
<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
           <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (11 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
<!-- Warning Section Ends -->

@endsection