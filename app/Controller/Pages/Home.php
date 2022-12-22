<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home
{
    /**
     * Metodo responsavel por retornar o conteudo da home
     * @return String
     */
    public static function getHome()
    {
        return View::render('pages/home');
    }
}
