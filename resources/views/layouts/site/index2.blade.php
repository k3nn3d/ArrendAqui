<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="{{asset('imagens/logo.png')}}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

   

    <link rel="stylesheet" href="{{asset('tamplate/fonts/icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('tamplate/fonts/flaticon/font/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('tamplate/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('tamplate/css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('tamplate/css/style.css')}}" />
    <!--
    <link rel="stylesheet" href="css/googlemaps.css">

    
    <link rel="stylesheet" href="https://maps.googleapis.com/maps/api/directions/json
    ?destination=Montreal
    &origin=Luanda
    &key=AIzaSyCtgPlK7U7uu9A-boT1BCd6k1ICOCyR_Q0">
    -->
    <script src="{{ asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Hy05vP8/nh+E/bq7E2W5/g+eD+81t3Az5tT1nRWK1nsa0sF6S+16XqU0zZFn3q7vQ8GZO1cRvFq5PDRJYQJFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    
    <style>
      #map {
        width: 100%;
        height: 600px;
      }
    </style>
    <title>
      PAP &mdash; 2022-2023
    </title>
  </head>
  <body >
<!-- [ Pre-loader ] start -->

<!-- [ Pre-loader ] End -->

         @yield('conteudo')
  
    
         <script src="{{asset('tamplate/js/bootstrap.bundle.min.js')}}"></script>
         <script src="{{asset('tamplate/js/tiny-slider.js')}}"></script>
         <script src="{{asset('tamplate/js/aos.js')}}"></script>
         <script src="{{asset('tamplate/js/navbar.js')}}"></script>
         <script src="{{asset('tamplate/js/counter.js')}}"></script>
         <script src="{{asset('tamplate/js/custom.js')}}"></script>
         
         <script src="{{asset('bootstrap/bootstrap.js')}}"></script>
         <script src="{{asset('bootstrap/bootstrap.min.js')}}"></script>
         <script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         

</body>

</html>