<?php
require_once('utilidades.php');


if(isset($_GET['url'])){

            $var = $_GET['url'];
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $numero = intval(preg_replace('/[^0-9]+/','',$var),10);
                switch($var){
                    case "restaurantes";
                            $resp = TodoslosRestaurantes();
                            print_r(json_encode($resp) );
                            http_response_code(200);
                    break;
                    case "restaurante/$numero";
                            $resp = ProductoPorID($numero);
                            print_r(json_encode($resp) );
                            http_response_code(200);
                    break;
                    case "restaurante/fotos/$numero";
                            $resp = FotosRestaurantes($numero);
                            print_r(json_encode($resp) );
                            http_response_code(200);
                    break;
                    default;

                }

            }else if($_SERVER['REQUEST_METHOD']=='POST'){

                $postBody = file_get_contents("php://input");
                $convert = json_decode($postBody,true);
                if(json_last_error()==0){

                    switch($var){
                        case "restaurante";
                                CrearRestaurante($convert);
                                http_response_code(200);
                        break;
                        default;

                    }

                }else{
                    http_response_code(400);
                }

            }else{
                http_response_code(405);
            }

}else{?>


  <link rel="stylesheet" href="public/estilo.css" type="text/css">

  <div class='container'>
    <h1>Rutas</h1>
    <div class='divbody'>

    <p>Restaurantes</p>
            <code>
                POST /restaurante

                <p style="color: #cb2d2d;">Obligatorios</p>

                      <br>RestauanteNombre
                      <br>RestauranteLogo
                      <br>RestauranteDescripcion
                <br>
                <p style="color: #4448e2;">Opcional</p>
                          <br>RestauanteRating
                          <br>RestauanteUbicacion


            </code>
            <code>
                GET /restaurantes
                <br/>
                GET /restaurante/$id
                <br>
                GET /restaurante/fotos/$RestauranteId
            </code>

    </div>
    <p class="divfooter">wwww.paginassite.com</p>
  </div>



 <?php
}

?>
