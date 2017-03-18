<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'Clases/Usuario.php';

$app = new \Slim\App;

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
//$app->run();


$app->get('/usuarios', function (Request $request, Response $response) {
    
    //$response->getBody()->write("Hello, $name");
 	try
 	{
 	
    	$TraerTodosLosUsuarios =  Usuario::TraerTodosLosUsuarios();//$response;
    	

    	
    	foreach ($TraerTodosLosUsuarios as $User)
    	{
    		 $response->getBody()->write("Lista \n".$User->Dni ." nombre: ". $User->Nombre . " Apellido " . $User->Apellido . " iD: " . $User->Id);
    	}   	
	}
	catch(Exception $ex)
	{
		return $ex-message();
	}
});



$app->run();