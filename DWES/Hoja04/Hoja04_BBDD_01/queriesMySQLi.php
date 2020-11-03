<?php
require_once "../ConexionMySQLi.php.php";

function getEquipos() {
    $conexion = getConexion();
    $sql = "SELECT nombre FROM equipos";
    if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_array()) {
            $equipos[] = $fila["nombre"];
        }
    }
    return $equipos;
}   

function getPosicion() {
    $conexion = getConexionBD();
    $sql = "SELECT DISTINCT posicion FROM jugadores";
    if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_array()) {
            $posiciones[] = $fila["posicion"];
        }
    }
    return $posiciones;
}

function getJugadoresDeEquipo($equipo) {

    return $datos;
}

function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipo) {

}

function updatePeso($nombre, $peso) {

}

?>