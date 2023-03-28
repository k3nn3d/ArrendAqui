<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Motorista banido</title>

  <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">

  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{asset('css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">


  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" href="{{asset('css/estilo5.css')}}">
</head>
<body>

  <div class="alert alert-danger " role="alert" style="text-align: center;align-items:center; justify-content:center; font-weight:900; margin-bottom:0; height: 15vh; font-size:20pt" ><p> Você foi banido!</p></div>
  <div class="alert alert-warning " role="alert" style="text-align: center; font-weight:500" >Para recuperar a sua conta pague {{$preco}}kz</div>

  
 
<div class ="body">
  
  <div class="conteiner">
    
      <div class="form-img" style="font-w">
      
      </div>
      
      <div class= "form">
          <form action="{{route('site.banido_pagamento.store', $preco)}}" method="POST" >
              @csrf
              
              <div class= "form-header">
               
                  <div class="title">
                      <h1>Pagar dívida</h1>
                  </div>
                 
  
              </div>
              <div class="input-group">
                  <div class="input-box" >
                     <div class="input"> 
                     <label for="vc_path">Comprovativo</label> <br>
                           <input id ="vc_path" name ="vc_path" placeholder="Comprovativo de pagamento" type="file" required>
                     </div>
                    
  
                  </div>
  
              </div>
              <div class="Continue-button">
                  <button type="submitr">Enviar Comprovativo de Pagamento</button>
                 
  
  
              </div>
            
          </form>
  
      </div>
  </div>
  </div>




</body>
</html>













        <!-- Name -->


        <!-- Email Address -->


        <!-- Password -->


        <!-- Confirm Password -->