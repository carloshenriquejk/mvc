<?php

namespace App\Http;

class Response
{


    /**
     * Código do status http
     */

    private $httpCode = 200;

    /**
     * Cabeçalho do response 
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteudi que está sendo retornado 
     * @var integer
     */
    private $contentType = 'text/html';

    /**
     * conteudo do  response
     * @var integer
     */
    private $content;

    /**
     * metodo responsavel por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed $content
     * @param integer $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }
    /**
     * metodo responsavel por alterar o content type do response
     * @param string $contentType
     */
    public function  setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('content-type', $contentType);
    }

    /**
     * metodo responsavel por adicionar um registro no vcabeçalho do response
     */
    public function addHeader($key, $values)
    {
        $this->headers[$key] = $values;
    }

    /**
     * metodo responsavel por enviar os headers para o navegador
     */
    public  function sendHeaders()
    {
        //STATUS
        http_response_code($this->httpCode);

        //ENVIAR OS HEADERS
        foreach ($this->headers as $key => $value) {
            header($key . ':' . $value);
        }
    }
    /**
     * metodo responsavel por enviar a respósta para o usuario
     */
    public function sendResponse()
    {
        // ENVIA OS HEADERS
        $this->sendHeaders();

        // IMPRIME O CONTEÚDO.
        switch ($this->contentType) {
            case 'text/html';
                echo $this->content;
                exit;
        }
    }
}
