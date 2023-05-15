<!DOCTYPE html>
<html lang="en">

<head>
    <title>PAP &mdash; 2022-2023</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="imagens/logo.png" type="image/x-icon">
    <!--Google maps-->
    <link rel="stylesheet" href="css/googlemaps.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://maps.googleapis.com/maps/api/directions/json
    ?destination=Montreal
    &origin=Luanda
    &key=AIzaSyCtgPlK7U7uu9A-boT1BCd6k1ICOCyR_Q0">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="module" src="js/googlemaps/googlemaps.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Google maps end-->
    <script src="{{ asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- vendor css -->
    <link rel="stylesheet" href="tmp/dist/assets/css/style.css">
    <script src="{{ asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    
    

</head>
  <body class="">

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
        <!-- [ Pre-loader ] End -->
    @include('layouts.perfil.nav')
    @include('layouts.perfil.header')
    @yield('conteudo')





    <!-- Required Js -->
    <script src="tmp/dist/assets/js/vendor-all.min.js"></script>
    <script src="tmp/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="tmp/dist/assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="tmp/dist/assets/js/plugins/apexcharts.min.js"></script>


    <!-- custom-chart js -->
    <script src="tmp/dist/assets/js/pages/dashboard-main.js"></script>
   
    
   
    
   
</body>

</html>
