<?php
require_once "Funciones.php";
require_once "WSDLDocument.php";
use App\WebServices\WSDLDocument;

$location = "http://localhost/DAW2/DWES/Tema08/Hoja08_WebServices_02/Ej1/ServerSOAP.php";
$uri = "http://localhost/DAW2/DWES/Tema08/Hoja08_WebServices_02/Ej1";
$wsdl = new WSDLDocument("Funciones", $location, $uri);
$wsdl->formatOutput = true;
header("Content-Type: text/xml");
echo $wsdl->saveXML();