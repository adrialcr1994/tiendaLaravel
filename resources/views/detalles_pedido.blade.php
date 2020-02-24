@extends('principal')

@section('content')

<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart"></i>Detalles del pedido</h1>
    </div>
    <div class="page">
        <div class="table-responsive">
            <h3>Datos del usuario</h3>
            <table class="table table-striped table-hover table-borderes">
            <tr>
                    <td>Nombre:</td>
                    <td>{{Auth::user()->nombre}}</td>
                </tr>
                <tr>
                    <td>Nick:</td>
                    <td>{{Auth::user()->nick}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td>{{Auth::user()->direccion}}</td>
                </tr>
            </table>
        </div>
        <div class="table-responsive">
            <h3>Datos del pedido</h3>
            <table class="table table-striped table-hover table-borderes">
                <tr>
                    <th>Producto:</th>
                    <th>Precio:</th>
                    <th>Cantidad:</th>
                    <th>Subtotal:</th>
                </tr>

                @foreach($carrito as $item)
                <tr>
                    <td>{{$item->nombre_producto}}</td>
                    <td>{{number_format($item->precio_producto,2)}}</td>
                    <td>{{$item->cantidad}}</td>
                    <td>{{number_format($item->precio_producto * $item->cantidad,2)}}</td>
                </tr>
                @endforeach
            </table>
            <hr>
                <h3>
                    <span class="label label-success">
                        Total a pagar: {{number_format($total,2)}} €
                    </span><hr>
                    <a href="{{route('mostrar_carrito')}}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Volver</a>
                    <a href="#" class="btn btn-warning">Proceder el pago <i class="fa fa-chevron-circle-right"></i></a>
                </h3>
        </div>
    </div>
</div>