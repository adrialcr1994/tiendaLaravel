<!--es una herencia-->
@extends('principal')
<!--Nombre que va a tener esta seccion-->
@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>

    <h1 style="text-align: center;">Pedidos</h1>
    <br>
    <table class="table" style="text-align: center; border: 3px;">
        <thead>
          <tr>
            <th>Nº Pedido</th>
            <th>Fecha Realizacion</th>
            <th>Estado</th>
            <th>Descargar Factura</th>
            <th>Anular Pedido</th>
            <th>Enviar al correo</th>
          </tr>
        </thead>
        <tbody>
        @foreach($resumen_pedido as $pedido)
          <tr>
              <td>{{$pedido->id_pedido}}</td>
              <td>{{$pedido->fecha_realizacion_pedido}}</td>
              <td>{{$pedido->estado_pedido}}</td>
              <td><a href="{{route('pdf', $pedido->id_pedido)}}"><span class="material-icons">picture_as_pdf</span></a></td>
              @if($pedido->estado_pedido == 'tramite')
              <td><a href="{{route('cancelar_pedido', $pedido->id_pedido)}}"><span class="material-icons">block</span></a></td>
              @endif
              @if($pedido->estado_pedido == 'cancelado')
              <td></td>
              @endif
              <td><a href="{{route('correo', $pedido->id_pedido)}}"><span class="material-icons">mail</span></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </body>
</html>
