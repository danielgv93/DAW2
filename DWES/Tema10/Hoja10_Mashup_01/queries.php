<?php
require_once "ConexionPDO.php";

function getMarkers() {
    $conexion = getConexionPDO();
    $resultado = $conexion->query("SELECT * FROM localizaciones");
    while ($registro = $resultado->fetch()) {
        $datos[] = array("id" => $registro["id"], "nombre" => $registro["nombre"], "direccion" => $registro["direccion"],
            "latitud" => $registro["latitud"], "longitud" => $registro["longitud"], "tipo" => $registro["tipo"]);
    }
    unset($conexion);
    return $datos;
}