<?php

namespace App\Utils;

class View
{

    /**
     * Metodo responsavel por retornar o conteudo de uma view
     * @param  String $view
     * @return String
     */
    public static function getContentView($view)
    {
        $file = __DIR__ . '/../../resources/view/' . $view . '.html';;
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsavel por retornar o conteudo renderizado da view
     * @param  String $view
     * @param  String $vars
     * @return String
     */
    public static function render($view, $vars = [])
    {
        //CONTEUDO DE VIEW
        $contentView = self::getContentView($view);

        //CHAVES DO ARRAY
        $keys = array_keys($vars);
        $keys = array_map(function ($item) {
            return '{{' . $item . '}}';
        }, $keys);

        //RETORNA O CONTEUDO ENDERIZADO 
        return str_replace($keys, array_values($vars), $contentView);
    }
}
