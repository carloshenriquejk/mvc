<?php

namespace App\Controller\Pages;

use App\Utils\View;

use App\model\Entity\Organization;


class Home extends Page
{
    /**
     * Metodo responsavel por retornar o conteudo da home
     * @return String
     */
    public static function getHome()
    {
        $obOrganization = new Organization;

        //VIEW DA HOME
        $content = View::render('pages/home', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description,
            'site' => $obOrganization->site
        ]);

        //RETORNA A VIEW DA PAGINA
        return parent::getPage('WDEV - canal - home', $content);
    }
}
