<?php

$location = "http://localhost/DAW2/DWES/Tema08/Hoja08_WebServices_02/Ej1/ServerSOAP.php";
$uri = "http://localhost/DAW2/DWES/Tema08/Hoja08_WebServices_02/Ej1";
$objeto = new SoapClient(null, ["location" => $location, "uri" => $uri]);
echo "72152050" . $objeto->getLetra("72152050");
echo "<hr>";
if ($objeto->compruebaDNI("72152050", "S")) {
    echo "DNI CORRECTO";
    } else {
    echo "DNI INCORRECTO";
}
