<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller\Pages\Home;
use App\Http\Response;
use App\http\Router;

define('URL', 'http://localhost/mvc');

$obRouter = new Router(URL);

//ROTA HOME
$obRouter->get('/', [
    function () {
        return new Response(200, Home::getHome());
    }
]);
exit;

//IMPRIME O RESPOSE DA ROTA 
$obRouter->run()
    ->sendResponse();

//echo "<pre>";print_r($method);echo "</pre>";
