
@extends('app')

@section('content')

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
<body class="container-fluid p-5 bg-primary" style="margin-top: 50px">

<div class="card p-3">

<div class="card-header">{{ __('Actualizar Datos') }}</div>
<br>

<form action="{{ route('actualizar_usuario') }}" method="GET">
  
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nick</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nick" name="nick" placeholder="{{$usuario->nick}}">
    </div>
  </div>

  <br>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" placeholder="{{$usuario->email}}">
    </div>
  </div>
<br>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="{{$usuario->nombre}}">
    </div>
  </div>
  
  <br>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">DNI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dni" name="dni" placeholder="{{$usuario->dni}}">
    </div>
  </div>

  <br>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Direccion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="{{$usuario->direccion}}">
    </div>
  </div>

  <br>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
</div>
</body>
</html>
