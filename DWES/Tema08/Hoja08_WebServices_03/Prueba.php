<?php

$location = "http://zoologico.laravel/api/wsdl";
try {
    $objeto = new SoapClient($location);
    echo $objeto->getAnimal(2);
} catch (SoapFault $e) {
    echo $e->getMessage();
}
