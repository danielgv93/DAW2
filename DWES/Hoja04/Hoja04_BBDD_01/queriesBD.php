<?php


function getEquipos($conexion) {
    $resultado = $conexion->query("SELECT nombre FROM equipos");
    return $resultado;
}   

function mostrarResultados($resultado){
    while ($registro = $resultado -> fetch()) {
        echo $registro["nombre"] . "<br>";
    }
}
?>