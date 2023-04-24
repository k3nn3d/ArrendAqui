<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="tamplate/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="tamplate/fonts/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="tamplate/css/tiny-slider.css" />
    <link rel="stylesheet" href="tamplate/css/aos.css" />
    <link rel="stylesheet" href="tamplate/css/style.css" />
    <link rel="stylesheet" href="css/googlemaps.css">

    
    <link rel="stylesheet" href="https://maps.googleapis.com/maps/api/directions/json
    ?destination=Montreal
    &origin=Luanda
    &key=AIzaSyCtgPlK7U7uu9A-boT1BCd6k1ICOCyR_Q0">
    <script src="{{ asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="module" src="js/googlemaps/googlemaps.js"></script>
    <title>
      PAP &mdash; 2022-2023
    </title>
  </head>
  <body>
<!-- [ Pre-loader ] start -->

<!-- [ Pre-loader ] End -->
@include('layouts.site.nav')
    @include('layouts.site.header')
         @yield('conteudo')
    @include('layouts.site.footer')
    


</body>

</html>