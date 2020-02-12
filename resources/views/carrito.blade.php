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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="{{url('../resources/js/jquery-3.4.1.js')}}"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="page-header">
            <h1><i class="fa fa-shopping-cart"></i>Carrito Compras</h1>
        </div>

        <div class="table-cart">
        @if(count($carrito))

        <p>
            <a href="{{route('vaciar_carrito')}}" class="btn btn-danger"><i class="fa fa-trash"></i> Vaciar Carrito</a>
        </p>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($carrito as $item)
                        <tr>
                            <td><img src="{{url('assets/imagenes/'  .$item->imagen_producto) }}" height="50" weith="50"></td>
                            <td>{{$item->nombre_producto}}</td>
                            <td>{{number_format($item->precio_producto,2)}} €</td>
                            
                            <td>
                                <input 
                                    type="number"
                                    min="1"
                                    max="100"
                                    value="{{$item->cantidad}}"
                                    id="producto_{{$item->codigo_producto}}"
                                >

                                <a 
                                    href="#" 
                                    class="btn btn-warning btn-update-item"
                                    data-href="{{route('actualizar_item', $item->codigo_producto)}}"
                                    data-id="{{ $item->codigo_producto }}"
                                    ><i class="fas fa-sync-alt"></i>
                                
                                </a>
                            </td>
                            <td>{{number_format($item->precio_producto * $item->cantidad,2)}} €</td>
                            <td>
                                <a href="{{route('borrar_item', $item->codigo_producto)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <h3><span class="label label-warning">No hay productos en el carrito</span></h3>
            @endif

            <hr>
            <p>
                <a href="{{route('inicio')}}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Seguir Comprando</a>
                <a href="#" class="btn btn-warning">Finalizar Compra <i class="fa fa-chevron-circle-right"></i></a>
            </p>
        </div>
    </div>
</body>

<script type="text/javascript" src="{{url('../resources/js/main.js')}}"></script>
</html>
