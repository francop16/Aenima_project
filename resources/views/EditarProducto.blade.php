<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles para heroku 
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">-->
        <title>Aenima Project</title>
    </head>
     <body>
        
        <h3 class="text-center mt-2">Editar Producto </h3>
     
        <hr class="container">
        <div class="container">
        
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger alert-dismissible fade show " role="alert">{{ $error }} </li>
        
                @endforeach
            </ul>
            <form action="{{ route('updateProducto', $producto->id)}}" method="POST" class="row" >
                @method('PUT')
                @csrf   
                <div class="row container col-12 ">
                    @if ( session('mensaje') )
                      <div class="alert alert-success text-center">{{ session('mensaje') }}</div>
                    @endif
                    @if ( session('existe') )
                      <div class="alert alert-danger text-center">{{ session('existe') }}</div>
                    @endif

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{ $producto->nombre }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                        <input class="form-control " type="text" name="descripcion" placeholder=" Descripc??on" value="{{ $producto->descripcion }}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2  ">
                        <input class="form-control" type="number" step="any" name="precio" min="0" placeholder="Precio $00.00" value="{{ $producto->precio }}">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-2  ">
{{--                    <input class="form-control col-lg-8 col-md-8 col-sm-12 mb-2" type="text" name="imagen" placeholder="imagen" value={{ old('imagen') }}>  --}}   
                    </div>
     
                 </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                        <button class="btn btn-warning container" type="submit">Guardar Cambios</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2 " >
                        <a href="{{ route('eliminarProducto', $producto->id)}}" class="btn btn-danger container  ">Eliminar Producto</a>
                    </div>
        
                    
            </form>  
                  
          </div>
        
         
     </body>
    </html>