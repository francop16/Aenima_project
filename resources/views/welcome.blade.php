<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts 
        <script src="{{ asset('js/app.js') }}" defer></script>-->
        <!-- Scripts para heroku-->
        <script src="{{ secure_asset('js/app.js') }}" defer></script> 
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <!-- Styles para heroku-->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> 
        <title>Aenima Project</title>
    </head>
    <body class="antialiased">
        
          <div id="app">
            <h1 class="text-center mt-3">Listado de Productos</h1>
                <productos-component /> 
                
          </div>
    </body>
</html>
