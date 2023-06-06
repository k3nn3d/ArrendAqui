@extends('layouts.site.index')  
@section('conteudo')
<!--HEADER START-->
<div
class="hero page-inner overlay mb-5"
style="background-image: url('tamplate/images/hero_bg_1.jpg')"
>

<div class="container">
  <div class="row justify-content-center align-items-center">
	<div class="col-lg-9 text-center mt-5">
	  <h1 class="heading" data-aos="fade-up">Seus convidados</h1>
	  <nav
		aria-label="breadcrumb"
		data-aos="fade-up"
		data-aos-delay="200"
	  >
		<ol class="breadcrumb text-center justify-content-center">
		  <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Painel</a></li>
		  <li
			class="breadcrumb-item active text-white-50"
			aria-current="page"
		  >
			Seus convidados
		  </li>
		</ol>
	  </nav>
	</div>

  </div>
</div>

</div>

   

        <!-- [ Main Content ] start -->
        <div class="row">
        
            <!-- table card-1 start -->
            <div class="col-xl-1"></div>
            <div class="col-md-12 col-xl-10">
  
              <h1 style="text-align:center;">Seus convidados</h1>
              <hr>
                <div class="card mb-5">
                  
                  <div class="card-body">  
                        
                    <div> 
                        <label for="">Seu link de convite</label>
                        <input type="text" class="form-control" value="{{ $url }}/{{ Auth::user()->link }}" readonly>
                      </div>         
                    <div class="table-responsive">
                      <div id="step-1" class="step">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nome</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                      
                          @forEach($users as $user)    
                         
                         <tr>
                          <td>#</td>
                           <td>
                            {{ $user->name }}  {{ $user->lastname }}
                           </td>
                         
                              
                      
                      @endforeach
                       
            
                         
                        @empty($user)
                          <tr>
                            <td colspan="6" style="text-align: center">Ainda não tem convidados</td>
                          </tr>
                        @endempty
                              
                        
                        
                         
                                   
             
                              
                          
                        </tbody>
                      </table>
                      </div>
                     
                    </div>
                  </div>
              </div>
             
              
             </div>
            
             
        <!-- [ Main Content ] end -->

      
  </div>
</div>




             
@endsection