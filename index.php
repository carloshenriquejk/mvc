<?php

require __DIR__ . '/vendor/autoload.php';


use App\http\Router;

define('URL', 'http://localhost/mvc');

$obRouter = new Router(URL);

include __DIR__ . '/routes/pages.php';

//IMPRIME O RESPOSE DA ROTA 
$obRouter->run()
    ->sendResponse();

//echo "<pre>";print_r($method);echo "</pre>";
