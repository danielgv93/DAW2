<?php
require_once "../ConexionBD.php";

function getEquipos() {
    $conexionNBA = getConexion("nba");
    $resultado = $conexionNBA->query("SELECT nombre FROM equipos");
    unset($conexionNBA);
    return $resultado;
}   

function getJugadoresDeEquipo($equipo) {
    $conexionNBA = getConexion("nba");
    $consulta = $conexionNBA->prepare("SELECT nombre from JUGADORES where nombre_equipo=?");
    $consulta->bindParam(1, $equipo);
    unset($conexionNBA);
    return $consulta;
}
?>