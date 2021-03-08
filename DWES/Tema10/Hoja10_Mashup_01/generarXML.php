<?php
require_once "queries.php";
header("Content-type: text/xml");

$dom = new DOMDocument("1.0");
$nodo = $dom->createElement("markers");
$nodoPadre = $dom->appendChild($nodo);

foreach (getMarkers() as $elemento) {
    $nodo = $dom->createElement("marker");
    $nodoMarker = $nodoPadre->appendChild($nodo);
    $nodoMarker->setAttribute("id", $elemento["id"]);
    $nodoMarker->setAttribute("name", $elemento["nombre"]);
    $nodoMarker->setAttribute("address", $elemento["direccion"]);
    $nodoMarker->setAttribute("lat", $elemento["latitud"]);
    $nodoMarker->setAttribute("lng", $elemento["longitud"]);
    $nodoMarker->setAttribute("type", $elemento["tipo"]);
}
echo $dom->saveXML();