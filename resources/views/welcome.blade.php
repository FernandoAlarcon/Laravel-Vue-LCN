<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ config('app.url') }}">
    <title> Infinety Contable </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
    <!-- AlpineJs -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
    <div id="app"> 
            
            
            @guest
                @include('index')
            @else

                <!--     Fonts and icons     -->
                <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                
                <!-- CSS Files -->
                
                <!-- <link href="./assets/css/bootstrap.min.css" rel="stylesheet" /> 
                <link href="./assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" /> -->
                
                <!-- CSS Just for demo purpose, don't include it in your project -->
                <!-- Styles -->

                <!-- <link href="./assets/demo/demo.css" rel="stylesheet" />  
                <link href="./assets/rubick/src/sass/app.scss" rel="stylesheet" />   -->
                
                <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                 
                <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
                 
                <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet"> 
                
                <div id="Aplicacion" >
                    <app auth="{{ Auth::user() }}" ></app>
                </div>  
                <!-- Scripts -->
                <script src="{{ asset('js/app.js') }}" defer></script> 
                
                
                <!-- BEGIN: JS Assets-->
                <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
 
                <!-- END: JS Assets-->
            @endguest
                 
    </div>
</body>
</html>