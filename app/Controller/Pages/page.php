<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page
{


    /**
     * Metodo responsavel por retornar header
     * @return String
     */
    private static function getHeader()
    {
        return View::render('pages/header');
    }

    /**
     * Metodo responsavel por retornar footer
     * @return String
     */
    private static function getfooter()
    {
        return View::render('pages/footer');
    }


    /**
     * Metodo responsavel por retornar o conteudo da pagina
     * @return String
     */
    public static function getPage($title, $content)
    {
        return View::render('pages/page', [
            'title' => $title,
            'header' => Self::getHeader(),
            'content' => $content,
            'footer' => Self::getfooter()
        ]);
    }
}
