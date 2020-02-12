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
    <div class="row bg-primary p-4 container-fluid style="width: 100%;">
        <div class="col-md-3 d-flex align-items-stretch">
            <div class="card mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
                <img class="card-img-top" src="{{url('assets/imagenes/'  .$datos->imagen_producto) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:center;">{{$datos->descripcion_producto}}</h5>
                    <h5 class="card-title" style="text-align:center;">{{$datos->precio_producto}} €</h5>
                    <p class="card-text">{{$datos->anuncio_producto}}</p>
                    <a href="{{route('añadir_item', $datos->codigo_producto)}}" class="btn btn-primary">Añadir al carrito</a>
                    <a href="{{route('inicio')}}" class="btn btn-warning">Volver</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>
