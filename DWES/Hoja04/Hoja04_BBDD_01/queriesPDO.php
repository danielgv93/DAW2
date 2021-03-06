<?php
require_once "ConexionPDO.php";

function getEquipos() {
    $conexionNBA = getConexionPDO();
    $resultado = $conexionNBA->query("SELECT nombre FROM equipos");
    while ($registro = $resultado->fetch()) {
        $datos[] = $registro["nombre"];
    }
    unset($conexionNBA);
    return $datos;
}   

function getPosicion() {
    $conexionNBA = getConexionPDO();
    $resultado = $conexionNBA->query("SELECT DISTINCT posicion FROM jugadores");
    while ($registro = $resultado->fetch()) {
        $datos[] = $registro["posicion"];
    }
    unset($conexionNBA);
    return $datos;
}

function getJugadoresDeEquipo($equipo) {
    $conexionNBA = getConexionPDO();
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

/* Modificado el comportamiento de claves ajenas de la BD (ON DELETE CASCADE ON UPDATE CASCADE) */
function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipo) {
    $conexionNBA = getConexionPDO();
    $todoOk = true;
    $conexionNBA->beginTransaction();
    $borrado = $conexionNBA->prepare("DELETE FROM jugadores WHERE nombre=?");
    $borrado->bindParam(1, $jugadorBaja);
    if ($borrado->execute() != true) {
        $todoOk = false;
    }
    $update = $conexionNBA->prepare("INSERT INTO jugadores (codigo, nombre, procedencia, altura, peso, posicion, nombre_equipo) VALUES ((SELECT (t.codigo + 1) from jugadores AS t ORDER BY t.codigo DESC LIMIT 1),?,?,?,?,?,?)");
    $update->bindParam(1, $nombre);
    $update->bindParam(2, $procedencia);
    $update->bindParam(3, $altura);
    $update->bindParam(4, $peso);
    $update->bindParam(5, $posicion);
    $update->bindParam(6, $equipo);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    if ($todoOk){
        $conexionNBA->commit();
        return true;
    } else {
        $conexionNBA->rollBack();
        return false;
    }
}

function updatePeso($nombre, $peso) {
    $conexionNBA = getConexionPDO();
    $todoOk = true;
    $update = $conexionNBA->prepare("UPDATE jugadores SET peso = ? WHERE nombre = ?");
    $update->bindParam(1, $peso);
    $update->bindParam(2, $nombre);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    return $todoOk;
}

?>