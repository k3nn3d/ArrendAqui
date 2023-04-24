 <!-- [ navigation menu ] start -->
 <nav class="pcoded-navbar  ">
  <div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div " >
      
      <div class="">
        <div class="main-menu-header">
          <img class="img-radius" src="tamplate/images/person11.jpg" alt="User-Profile-Image">
          <div class="user-details">
            <span>{{Auth::user()->name}} {{Auth::user()->lastname}}</span>
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
            </div>
          </div>
        </div>
        
    </div>
  </div>
</nav>
<!-- [ navigation menu ] end -->