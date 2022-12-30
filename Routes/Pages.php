<?php

use App\Controller\Pages;
use App\Http\Response;

//ROTA HOME
$obRouter->get('/', [
    function () {
        return new Response(200, Pages\Home::getHome());
    }
]);

//ROTA SOBRE
$obRouter->get('/sobre', [
    function () {
        return new Response(200, Pages\Home::getHome());
    }
]);
