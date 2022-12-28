<?php

namespace App\Http;

class Response
{
    /**
     * Codigo do status HTTP 
     * @var interger
     */
    private $httpCode = 200;

    /**
     * cabeçalho do response  
     * @var interger
     */
    private $headers = [];

    /**
     *tipo do conteudo que está sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     *tipo do conteudo que está sendo retornado
     * @var mixed
     */
    private $content;

    /** 
     * METODO RESPONSAVEL POR INICIAR A CLASSE E DEFINIR OS VALORES
     * @param integer $HTTPCODE
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->$content = $content;
        $this->setContentType($contentType);
    }

    /**
     * metodo responsavel por alterar o content type do response
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeandle('Content-type', $contentType);
    }

    /**
     * metodo responsavel por adicionar um registro no cabeçalho do response
     * @param string $key
     * @param strng $value
     */
    public function addHeandle($key, $value)
    {
        $this->header[$key] = $value;
    }

    /**
     * metodo responsavel por enviar a resposta para o usuario 
     */
    public function sendResponse()
    {
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}
