<?php
require_once("db.php");

function FotosRestaurantes($id){
  $Query ="select * from restaurante_fotos where Estado = 'Activo' and RestauranteId = $id";
  $Respuesta = ObtenerRegistros($Query);
  return ConvertirUTF8($Respuesta);
}

function TodoslosRestaurantes(){
    $Query = "select * from restaurante";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}


function ProductoPorID($id){
    $Query = "select * from restaurante where RestauranteId = $id";
    $Respuesta = ObtenerRegistros($Query);
    //  print_r($Respuesta);
    return ConvertirUTF8($Respuesta);
}


function CrearRestaurante($array){

            $Nombre = $array[0]['RestauranteNombre'];
            $Logo =$array[0]['RestauranteLogo']; ;
            $Descripcion =$array[0]['RestauranteDescripcion']; ;


            $query = "insert into restaurante(RestauranteNombre,RestauranteLogo,RestauranteDescripcion)
            values('$Nombre','$Logo','$Descripcion')";
            $respuesta = NonQuery($query);

            //print_r($query);

            return true;




}



?>
