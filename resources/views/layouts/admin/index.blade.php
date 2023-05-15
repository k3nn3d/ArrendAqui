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
    

    <!-- vendor css -->
    <link rel="stylesheet" href="tmp/dist/assets/css/style.css">
    <script src="{{ asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
  <body class="">

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
        <!-- [ Pre-loader ] End -->
    @include('layouts.admin.nav')
    @include('layouts.admin.header')
    @yield('conteudo')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer">
      
    </script>





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
