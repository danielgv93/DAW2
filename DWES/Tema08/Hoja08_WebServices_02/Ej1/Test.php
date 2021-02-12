<?php
$location = "C:\xampp\htdocs\DAW2\DWES\Tema08\Hoja08_WebServices_02\Ej1\ServerSOAP.php";
$uri = "C:\xampp\htdocs\DAW2\DWES\Tema08\Hoja08_WebServices_02\Ej1";
$objeto = new SoapClient(null, ["location" => $location, "uri" => $uri]);
echo $objeto->getLetra("72152050");