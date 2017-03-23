<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'Clases/Usuario.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);


/*
$config['db']['host']   = "localhost";
$config['db']['user']   = "id1133428_stapower";
$config['db']['pass']   = "38127739";
$config['db']['dbname'] = "id1133428_pps";

spl_autoload_register(function ($classname) {
    require ("../classes/" . $classname . ".php");
});


//app = new \Slim\App;


$container = $app->getContainer();


$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};*/


$app->get('/tickets', function (Request $request, Response $response) {
    $this->logger->addInfo("Ticket list");
    $mapper = new TicketMapper($this->db);
    $tickets = $mapper->getTickets();

    $response->getBody()->write(var_export($tickets, true));
    return $response;
});

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
    		 $response->getBody()->write("Lista: Rol:".$User->rol ." usuario: ". $User->usuario . " contraseña " . $User->contraseña . " iD: " . $User->id . "\n /n");
    	}   	
	}
	catch(Exception $ex)
	{
		echo $ex-message();
	}
});


$app->post('/books', function () {
    //Create book
});

$app->post('/add/{usuario}', function (Request $request, Response $response, $args) {
    try
    {
        $usuario = $request->getAttribute('usuario');
        $usuarioDatos = array();
         $usuarioDatos = explode(',', $usuario);
        echo $usuarioDatos[0].$usuarioDatos[1].$usuarioDatos[2];
        Usuario::AltaUsuario($usuarioDatos[0],$usuarioDatos[1],$usuarioDatos[2]);
    }
    catch(Exception $ex)
    {
        echo $ex-message();
    }
});

$app->put('/update/{usuario}', function (Request $request, Response $response){
    //Update book identified by $id
    try
    {
        $usuario = $request->getAttribute('usuario');
        $usuarioDatos[] = explode(',', $usuario);
        echo json_encode(Usuario::ModificarUsuario($usuarioDatos[0],$usuarioDatos[1],$usuarioDatos[2],$usuarioDatos[3]));
    }
    catch(Exception $ex)
    {
        echo $ex-message();
    }
});

$app->delete('/books/:id', function ($id) {
    //Delete book identified by $id
    try
    {
       $usuario = $request->getAttribute('usuario');
       echo json_encode(Usuario::ModificarUsuario($usuario));
    }
    catch(Exception $ex)
    {
        echo $ex-message();
    }
});

$app->run();