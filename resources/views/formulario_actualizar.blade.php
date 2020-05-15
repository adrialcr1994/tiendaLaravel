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