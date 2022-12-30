<?php

namespace App\http;

use App\Http\Response;
use \Closure;
use Exception;

class Router
{
    /**
     * URL Completa do projeto (raiz)
     * @var string
     */
    private $url;

    /**
     * prefixo de todas as rotas
     * @var string
     */
    private $prefix;


    /**
     * indíce de rotas 
     * @var array
     */

    private $routers = [];

    /**
     * instancia do resquest
     * @var request
     */
    private $request;

    /**
     * Método responsavel por iniciar a classe
     * @param string $uri
     */
    public function __construct($url)
    {
        $this->request = new Request($this);
        $this->url = $url;
        $this->setPrefix();
    }

    /**
     * Metodo responsável por definir o prefixo das rotas
     */
    public function setPrefix()
    {
        //INFORMAÇÕES DA URL ATUAL
        $parseUrl = parse_url($this->url);

        //define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Método responsavel por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     */
    public function addRoute($method, $route, $params = [])
    {

        //VALIDAÇÃO DOS PARAMETROS 
        foreach ($params as $key => $value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //PADRÃO DE VALIDAÇÃO DA URL
        $pattenerRoute = '/^' . str_replace('/', '\/', $route) . '$/';

        //ADICIONA A ROTA DA CLASSE
        $this->routers[$pattenerRoute][$method] = $params;
        echo "<pre>";
        print_r($this);
        echo "</pre>";
        exit;
    }

    /**
     * Metódo responsável por definir uma rota de GET
     * @param string $route
     * @param string $params
     */
    public function get($route, $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }


    /**
     * metodo responsável por execultar a rota atual
     * @return Response
     */

    public function run()
    {
        try {
            throw new \Exception("Error Processig Request", 1);
        } catch (Exception $e) {
            return new  Response($e->getCode(), $e->getMessage());
        }
    }
}
