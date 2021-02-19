<?php

$location = "http://zoologico.laravel/api/wsdl";

try {
    $objeto = new SoapClient($location);
    var_dump($objeto->getAnimalesAlimentacion("herbívoro"));
} catch (SoapFault $e) {
    $e->getMessage();
}

