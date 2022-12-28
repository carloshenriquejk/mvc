<?php

namespace App\http;

class Request
{

    /**
     * Metodo http da requisição
     * @var string
     */
    private $httpMethod;

    /**
     * uri da pagina
     * @var string
     */
    private $uri;

    /**
     * Parametros da uri ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * variaveis recebidas no post da pagina ($_POST)
     * @var array
     */
    private $postvars = [];

    /**
     * cabeçalho da requisição
     * @var array
     */
    private $headers = [];

    /**
     * construtor da classe
     */
    public function __construct()
    {

        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri          = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * METHODO RESPONSAVEL POR RETORNAR O METODO HTTP DA REQUISIÇÃO
     * @return string
     */
    public function getHttphethod()
    {
        return $this->httpMethod;
    }

    /**
     * METHODO RESPONSAVEL POR RETORNAR O postvars HTTP DA REQUISIÇÃO
     * @return string
     */
    public function gepostvars()
    {
        return $this->postvars;
    }

    /**
     * METHODO RESPONSAVEL POR RETORNAR OS header DA REQUISIÇÃO
     * @return string
     */
    public function getheader()
    {
        return $this->header;
    }

    /**
     * METHODO RESPONSAVEL POR RETORNAR OS PARAMETROS DA REQUISIÇÃO
     * @return string
     */
    public function getqueryParams()
    {
        return $this->queryParams;
    }

    /**
     * METHODO RESPONSAVEL POR RETORNAR O METODO URI DA REQUISIÇÃO
     * @return string
     */
    public function getURI()
    {
        return $this->URI;
    }
}
