<?php

/**
 * Class SOAP
 * @property string $texto
 */
class SOAP {

    private $class = SoapServicesFunciones::class;
    private $uri = "http://localhost/examen/public/api";
    private $url = "http://localhost/examen/public/api/wsdl";
    public function getServer()
    {
        $server = new SoapServer($this->url);
        $server->setClass($this->class);
        $server->handle();
        exit();
    }

    public function getWsdl()
    {
        $wsdl = new WSDLDocument($this->class, $this->uri);
        $wsdl->formatOutput = true;
        header("Content-Type: text/xml");
        echo $wsdl->saveXML();
        exit();
    }



}