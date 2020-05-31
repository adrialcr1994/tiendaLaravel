<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <title>Document</title>
</head>
<body style="text-align: center">

<h1>Resumen de su pedido</h1>
<br>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>  
        <tr>
            <td>{{$datos->id_pedido}}</td>     
            <td>{{$datos->fecha_realizacion_pedido}}</td>           
            <td>{{$datos->estado_pedido}}</td>
        </tr>
    </tbody>
</table>
</body>
</html>

