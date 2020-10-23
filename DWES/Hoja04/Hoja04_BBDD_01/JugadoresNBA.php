<?php
require_once "../ConexionBD.php";
require_once "queriesBD.php";

$conexionNBA = getConexion("nba");

mostrarResultados(getEquipos($conexionNBA));

?>