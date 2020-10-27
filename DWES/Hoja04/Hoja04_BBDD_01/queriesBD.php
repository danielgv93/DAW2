<?php
require_once "../ConexionBD.php";

function getEquipos() {
    $conexionNBA = getConexion("nba");
    $resultado = $conexionNBA->query("SELECT nombre FROM equipos");
    while ($registro = $resultado->fetch()) {
        $datos[] = $registro["nombre"];
    }
    unset($conexionNBA);
    return $datos;
}   

function getJugadoresDeEquipo($equipo) {
    $conexionNBA = getConexion("nba");
    $consulta = $conexionNBA->prepare("SELECT nombre, peso FROM jugadores WHERE nombre_equipo=?");
    $consulta->bindParam(1, $equipo);
    if($consulta->execute()) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("nombre"=>$fila["nombre"], "peso" => $fila["peso"]);
        }
    }
    unset($conexionNBA);
    return $datos;
}

function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso) {
    $conexionNBA = getConexion("nba");
    $todoOk = true;
    $conexionNBA->beginTransaction();
    $borrado = $conexionNBA->prepare("DELETE FROM jugadores WHERE nombre=?");
    $borrado->bindParam(1, $jugadorBaja);
    if ($borrado->execute() != true) {
        $todoOk = false;
    }
    $update = $conexionNBA->prepare("INSERT INTO jugadores (nombre, procedencia, altura, peso) VALUES (?,?,?,?)");
    $update->bindParam(1, $nombre);
    $update->bindParam(2, $procedencia);
    $update->bindParam(3, $altura);
    $update->bindParam(4, $peso);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    if ($todoOk){
        $conexionNBA->commit();
    } else {
        $conexionNBA->rollBack();
    }
}

?>