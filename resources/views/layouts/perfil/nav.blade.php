 <!-- [ navigation menu ] start -->
 <nav class="pcoded-navbar  ">
  <div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div " >
      
      <div class="">
        <div class="main-menu-header">
          <img class="img-radius" src="tamplate/images/person11.jpg" alt="User-Profile-Image">
          <div class="user-details">
            <span>{{Auth::user()->name}}</span>
            <div id="more-details">@switch(Auth::user()->vc_tipo_utilizador)
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
                  Afiliado
                    
                    @break
                @case(5)
                    Senhorio
                      
                      @break
                @case(6)
                  Cliente
                    
                    @break    
                @default
                    Usuário Não identificado
            @endswitch 
            <i class="fa fa-chevron-down m-l-5"></i></div>
          </div>
        </div>
        <div class="collapse" id="nav-user-link">
          <ul class="list-unstyled">
            <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Ver Perfil</a></li>
            <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Definições</a></li>
            <li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Sair</a></li>
          </ul>
        </div>
      </div>
      
      <ul class="nav pcoded-inner-navbar ">
        <li class="nav-item pcoded-menu-caption">
          <label>Menu</label>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.painel') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.user') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Seus dados</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.categoria') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></i></span><span class="pcoded-mtext">Seus carros</span></a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.sub_categoria') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></i></span><span class="pcoded-mtext">Suas casas</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('site.chat.list') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></i></span><span class="pcoded-mtext">Chat</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('site.chat.list') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></i></span><span class="pcoded-mtext">Pagamentos</span></a>
  </li>

      <li class="nav-item">
        <a href="{{ route('admin.casa') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Pagamentos</span></a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.carro') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></i></span><span class="pcoded-mtext">Carros</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.aluguel') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></i></span><span class="pcoded-mtext">Seus aluguéis</span></a>
</li>
<li class="nav-item">
  <a href="{{ route('admin.aluguel') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></i></span><span class="pcoded-mtext">Seus aluguéis</span></a>
</li>
 
      </ul>
      
           
    </div>
  </div>
</nav>
<!-- [ navigation menu ] end -->