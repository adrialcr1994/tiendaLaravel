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
<h1 style="text-align: center" class="bg-warning">Productos destacados</h1>
  <div class="row bg-primary p-4 container-fluid" style='width: auto'>
@foreach($productos as $producto)

<div class="col-md-3 d-flex align-items-stretch">
  <div class="card mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
    <img class="card-img-top" src="{{url('assets/imagenes/'  .$producto->imagen_producto) }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center;">{{$producto->nombre_producto}}</h5>
        <h5 class="card-title" style="text-align:center;">{{$producto->precio_producto}} €</h5>

        <p style="text-align: center">
        <a href="{{ route('detalles_producto', $producto->codigo_producto)}}" class="btn btn-primary">Ver Detalles</a>
        </p>
        <p style="text-align: center">
        <a href="{{route('añadir_item', $producto->codigo_producto)}}" class="btn btn-warning">Añadir al carrito</a>
        </p>
      </div>
  </div>
</div>
@endforeach

</div>
</div>
</body>
</html>
