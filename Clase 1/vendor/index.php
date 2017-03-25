<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'autoload.php';

$app = new \Slim\App;
$app->put('/put', function (Request $request, Response $response) {
    //Delete book identified by $id
    try
    {
        echo "hola";

       
        $archivo = fopen("usuario.txt", "a");
        $renglon = "hola";
        fwrite($archivo, $renglon);
        fclose($archivo);
        echo "chau";
   
      // $usuario = $request->getAttribute('usuario');
       //echo json_encode(Usuario::ModificarUsuario($usuario));
    }
    catch(Exception $ex)
    {
        echo $ex-message();
    }
});

$app->run();