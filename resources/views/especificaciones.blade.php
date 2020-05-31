<!--es una herencia-->
@extends('principal')
<!--Nombre que va a tener esta seccion-->
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>

<div class="container-fluid" style="width: 100%;">
    <div class="row bg-primary p-4 container-fluid" style='width: auto'>
    <article class="post clearfix shadow p-4 mb-4 bg-light">
            <a href="#" class="thumb float-left"
              ><img
              src="{{url('assets/imagenes/'  .$datos->imagen_producto) }}"
                height="500"
                width="420"
                class="img-thumbnail rounded float-left mr-3"
            /></a>
            <h2 class="post-title">Información</h2>
            
            <p class="post-contenido text-justify">
            {{$datos->anuncio_producto}}
            </p>
            
            <p style="text-align: center">
            Precio: {{$datos->precio_producto}} €
            </p>
            <p style="text-align: center">
                <a href="{{route('añadir_item', $datos->codigo_producto)}}" class="btn btn-primary">Añadir al carrito</a>
            </p>
            <p style="text-align: center">
                <a href="{{route('inicio')}}" class="btn btn-warning">Volver</a>
            </p>
          </article>
    </div>
</div>
</body>
</html>
