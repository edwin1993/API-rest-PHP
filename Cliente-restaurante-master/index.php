    <?php

    function API($ruta){
        $url = "http://localhost/Api_restaurantes-master/";
        $respuesta = $url . $ruta;
        return $respuesta;
    }

    $direccion = API("restaurantes");
    $json = file_get_contents($direccion);
    $datos = json_decode($json,true);
    //$datos = json_decode($json, true);
    //print_r($datos);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- As a heading -->
<nav class="navbar navbar-light bg-light">
  <span class="navbar-brand mb-0 h1">paginassite</span>
</nav>

<div class="container">

<div class="row m-4">


<ul class="">

<?php

foreach($datos as $key => $value){
    $nombre = $value["RestauranteNombre"];
    $foto = $value["RestauranteLogo"];
    $descripcion = $value["RestauranteDescripcion"];

    
    echo"
    <li class='list-group-item active'>Restaurantes de Bogota</li>
    <li class='list-group-item'>
    Nombre: $nombre
    </li>
    <li class='list-group-item'>
    <img src='$foto' alt='' width='200p' height='200px'>
    </li>
    <li class='list-group-item'>
    Descripcion: $descripcion
    </li>
    <br>

";
}

?>

</ul>
</div>
</div>
    
</body>
</html>