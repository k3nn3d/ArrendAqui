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
          <a href="{{ route('admin.user') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-user"></i></span><span class="pcoded-mtext">Utilizadores</span></a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.categoria') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></i></span><span class="pcoded-mtext">Categorias</span></a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.sub_categoria') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-"></i></i></span><span class="pcoded-mtext">Subcategorias</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.provincia') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-map"></i></i></span><span class="pcoded-mtext">Províncias</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.municipio') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-map"></i></i></span><span class="pcoded-mtext">Municípios</span></a>
  </li>

      <li class="nav-item">
        <a href="{{ route('admin.casa') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-home"></i></span><span class="pcoded-mtext">Casas</span></a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin.carro') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-car"></i></i></span><span class="pcoded-mtext">Carros</span></a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.aluguel') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-key"></i></i></span><span class="pcoded-mtext">Arrendamentos</span></a>
</li>
  <li class="nav-item pcoded-menu-caption">
    <label>Mensagens</label>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.suporte') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-"></i></i></span><span class="pcoded-mtext">Suporte</span></a>
  </li>
  <li class="nav-item">
    <a href="{{route('admin.comentario')}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-comment"></i></i></span><span class="pcoded-mtext">Comentários</span></a>
</li>
<li class="nav-item pcoded-menu-caption">
  <label>Preço pagamentos</label>
</li>
<li class="nav-item">
  <a href="{{route('admin.motorista.preco')}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-car"></i></i></span><span class="pcoded-mtext">Motoristas</span></a>
</li>
<li class="nav-item">
  <a href="{{route('admin.afiliado.preco')}}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-users"></i></i></span><span class="pcoded-mtext">Afiliados</span></a>
</li>

        
        <li class="nav-item pcoded-menu-caption">
          <label>Pagamentos</label>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.motorista')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Motoristas</span></a>
      </li>
      <li class="nav-item">
        <a href="{{route('admin.afiliado')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Afiliados</span></a>
    </li>
       

        <li class="nav-item pcoded-menu-caption">
            <label>Outros</label>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.logs') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Logs</span></a>
        </li>
{{--        <li class="nav-item pcoded-menu-caption">
          <label>EXECESSO</label>
      </li>
        <li class="nav-item">
            <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
        </li>
        <li class="nav-item pcoded-menu-caption">
          <label>Chart & Maps</label>
        </li>
        <li class="nav-item">
            <a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
        </li>
        <li class="nav-item">
            <a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
        </li>
        <li class="nav-item pcoded-menu-caption">
          <label>Pages</label>
        </li>
        <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
            <ul class="pcoded-submenu">
                <li><a href="auth-signup.html" target="_blank">Sign up</a></li>
                <li><a href="auth-signin.html" target="_blank">Sign in</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>

      </ul>
      --}}

      
           
    </div>
  </div>
</nav>
<!-- [ navigation menu ] end -->