

{{--
          
          
            <h2 style="font-weight: 900"> <span class="text-primary">Alug'</span><span class="text-success">aqui</span></h2>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                  </li>
                 
                
                  <li class="nav-item">
                    <a class="nav-link" href="">Sobre Nós</a>
                  </li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                      aria-expanded="false">Bens</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="">Casas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('carros')}}">Carros</a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contato')}}">Contacte-nos</a>
                  </li>
                  @if (Route::has('login'))
                  @auth
                  @if(Auth::user()->vc_tipo_utilizador==1)
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.painel')}}">Painel</a>
                  </li>
                  @endif
                  @endauth
                  @endif

                 
                
                </ul>
            </div>
                
             

              <div class="col-lg-5 pr-0" >
              
                  @if (Route::has('login'))
                  @auth
                  <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  @else
                  <ul class="nav navbar-nav navbar-right center_nav pull-right">
                  @endauth
                  @endif
                  @if (Route::has('login')) 
                  @auth
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>
                <li class="nav-item">
                  <a href="#" class="icons">
                    <i class="ti-heart" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a href="#" class="icons nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false"> <i class="ti-user" aria-hidden="true"></i> </a>
                  <ul class="dropdown-menu">
                    <li class="nav-item "><span style="margin-left: 25px;">{{Auth::user()->username}}</span></li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('user.perfil')}}"> <i class="ti-user"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="ti-charts"></i> Definições</a>
                    </li>
                    <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}" id="form_1">
                        @csrf
                      <a onclick="document.getElementById('form_1').submit()" class="nav-link">Sair</a>
                    </form>
                </li>
                  </ul>
                </li>
               
               
           
                  @else
                  <li class="nav-item">
                      <a href="{{ route('login') }}" class="icons">Entrar</a>
                    </li>
                      @if (Route::has('register'))
                      <li class="nav-item">
                          <a href="{{ route('register') }}" class="icons">Criar conta</a>
                        </li>
                      @endif
                  @endauth
              
          @endif
           </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--================Header Menu Area =================-->
  --}}

