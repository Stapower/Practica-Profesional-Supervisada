<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'Clases/Usuario.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = "localhost";
$config['db']['user']   = "user";
$config['db']['pass']   = "password";
$config['db']['dbname'] = "exampleapp";

spl_autoload_register(function ($classname) {
    require ("../classes/" . $classname . ".php");
});


//app = new \Slim\App;
$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();


$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


/*$app->get('/tickets', function (Request $request, Response $response) {
    $this->logger->addInfo("Ticket list");
    $mapper = new TicketMapper($this->db);
    $tickets = $mapper->getTickets();

    $response->getBody()->write(var_export($tickets, true));
    return $response;
});*/

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

             $response->getBody()->write("Lista \n usuario: ".$User->Usuario ." Mail: ". $User->Mail . " Nombre " . $User->Nombre . " Apellido: " . $User->Apellido . "contraseña" . $User->Contraseña . "ID: " . $User->Contraseña);
    	}   	
	}
	catch(Exception $ex)
	{
		return $ex-message();
	}
});


$app->put('/put', function () {
    echo "hola";//Create book
});

$app->post('/add/{usuario}', function ($request, $response, $args) {
    try
    {
       $usuario = $request->getAttribute('usuario');
       $datosUsuario = array();
       $datosUsuario = explode(',', $usuario);

       Usuario::AltaUsuario($datosUsuario[0],$datosUsuario[1],$datosUsuario[2],$datosUsuario[3],$datosUsuario[4]);
    }
    catch(Exception $ex)
    {
        return $ex-message();
    }
});

$app->delete('/delete/{usuario}', function ($request, $response, $args) {
    try
    {
       $usuarioId = $request->getAttribute('usuario');
       Usuario::BajaUsuario($usuarioId);
    }
    catch(Exception $ex)
    {
        return $ex-message();
    }
});


$app->run();