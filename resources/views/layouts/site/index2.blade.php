<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="imagens/logo.png" />

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Hy05vP8/nh+E/bq7E2W5/g+eD+81t3Az5tT1nRWK1nsa0sF6S+16XqU0zZFn3q7vQ8GZO1cRvFq5PDRJYQJFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
     <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <title>
      PAP &mdash; 2022-2023
    </title>
  </head>
  <body >
<!-- [ Pre-loader ] start -->

<!-- [ Pre-loader ] End -->

         @yield('conteudo')
  
    
         <script src="tamplate/js/bootstrap.bundle.min.js"></script>
         <script src="tamplate/js/tiny-slider.js"></script>
         <script src="tamplate/js/aos.js"></script>
         <script src="tamplate/js/navbar.js"></script>
         <script src="tamplate/js/counter.js"></script>
         <script src="tamplate/js/custom.js"></script>
         
         <script src="bootstrap/bootstrap.js"></script>
         <script src="bootstrap/bootstrap.min.js"></script>
         <script src="bootstrap/bootstrap.bundle.min.js"></script>
         <script>
           (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
                 ({key: "AIzaSyCtgPlK7U7uu9A-boT1BCd6k1ICOCyR_Q0", v: "weekly"});    
         </script>
         

</body>

</html>