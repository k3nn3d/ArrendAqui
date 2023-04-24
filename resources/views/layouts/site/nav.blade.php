<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  
  <nav class="site-nav">
    <div class="container">
      <div class="menu-bg-wrap">
        <div class="site-navigation">
          <a href="{{ route('home') }}" class="logo m-0 float-start">Arrend'Aqui</a>
  
          <ul
            class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
          >
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li class="has-children">
              <a href="#">Bens</a>
              <ul class="dropdown" style="border-radius: 8px">
                <li><a href="{{ route('casas') }}">Alugar</a></li>
                <li><a href="{{ route('site.casa.create') }}">Pôr em alguel</a></li>
              </ul>
            </li>
            <li><a href="{{ route('servicos') }}">Serviços</a></li>
            <li><a href="{{ route('sobre-nos') }}">Sobre Nós</a></li>
            <li><a href="{{ route('contato') }}">Contacte-nos</a></li>
            @if (Route::has('login'))
            @auth
            @if(Auth::user()->vc_tipo_utilizador==1 || Auth::user()->vc_tipo_utilizador==2)
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.painel')}}">Painel</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.perfil')}}"> <i class="ti-user"></i> Perfil</a>
            </li>
            @endif
            @endauth
            @endif
            @if (Route::has('login')) 
            @auth
        
          <li class="has-children">
            <a> <img style="width: 24px" src="{{Auth::user()->vc_path}}" alt=""> </a>
            <ul class="dropdown" style="border-radius: 8px">
              <li><span style="margin-left: 20px;">@_{{Auth::user()->username}}</span></li>
              <hr>
              <li >
                <a  href="{{ route('user.perfil') }}"> <i class="ti-user"></i>Perfil</a>
              </li>
              <li >
                <a  href="{{ route('site.chat.list') }}"> <i class="ti-user"></i>Mensagens</a>
              </li>
              @switch(Auth::user()->vc_tipo_utilizador)
                @case(5)
              <li >
                <a  href="{{ route('user.casa') }}"><i class="ti-home"></i>Casas</a>
              </li>
                @break
                @case(3)
              <li >
                <a  href="{{ route('user.carro') }}"><i class="ti-user"></i>Carros</a>
              </li>
                @break
                @endswitch
              <li >
                <a  href="{{ route('user.aluguel') }}"><i class="ti-home"></i> @if(Auth::user()->vc_tipo_utilizador==3)Reservas @else Arrendamentos @endif</a>
              </li>
              <li >
                <a  href="{{ route('user.pagemento.index') }}"><i class="ti-home"></i>Pagamentos</a>
              </li>
              <li >
                <a  href="{{ route('user.user.index') }}"><i class="ti-home"></i>Definições</a>
              </li>
              <li >
                <form method="POST" action="{{ route('logout') }}" id="form_1">
                  @csrf
                  <input type="hidden" id="username" name="username" value="{{ Auth::user()->username }}">
                <a onclick="document.getElementById('form_1').submit()" style="margin-left: 20px;"><i class="ti-home"></i>Sair</a>
                
              </form>
          </li>
            </ul>
          </li>
         
         
     
            @else
            <li class="nav-item">
                <a class="active" href="{{ route('login') }}" class="icons">Entrar</a>|
              </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="icons">Criar conta</a>
                  </li>
                @endif
            @endauth
        
    @endif
          </ul>
  
          <a
            href="#"
            class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
            data-toggle="collapse"
            data-target="#main-navbar"
          >
            <span></span>
          </a>
        </div>
      </div>
    </div>
  </nav>




                       
             {{--Tela de Login--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <form action="{{route('admin.casa.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @include('admin.casa.form')

                  <div class="modal-footer">
                      <button type="button" class="btn  btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button  class="btn  btn-primary" id="ajaxSubmit" type="submit" >Adicionar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
 