<?php

$location = "http://localhost/Test/public/api/wsdl";

try {
    $objeto = new SoapClient($location);
    var_dump($objeto->getTransportistas());
} catch (SoapFault $e) {
    $e->getMessage();
}

