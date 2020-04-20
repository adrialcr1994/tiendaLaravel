<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container-fluid" style="margin-top:5%;">
    
    <div>
    <!--Si metemos el include aparecera siempre-->
    @include('app')
    </div>
    <div>
    <!--Con el yield es como metemos las diferentes vistas en la pagina principal-->
   @yield('content')
   </div>
    
    
</body>
</html>