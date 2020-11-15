<?php
require_once "ConexionMySQLi.php";

function getEquipos() {
    $conexion = getConexionSQLi();
    $sql = "SELECT nombre FROM equipos";
    if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_array()) {
            $equipos[] = $fila["nombre"];
        }
    }
    $conexion->close();
    return $equipos;
}   

function getPosicion() {
    $conexion = getConexionSQLi();
    $sql = "SELECT DISTINCT posicion FROM jugadores";
    if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_array()) {
            $posiciones[] = $fila["posicion"];
        }
    }
    $conexion->close();
    return $posiciones;
}

function getJugadoresDeEquipo($equipo) {
    $conexion = getConexionSQLi();
    $consulta = $conexion->stmt_init();
    $consulta->prepare("SELECT nombre, peso FROM jugadores WHERE nombre_equipo=?");
    $consulta->bind_param("s",$equipo);
    $consulta->execute();
    $consulta->bind_result($nombre, $peso);
    while ($consulta->fetch()) {
        $datos[] = array("nombre"=>$nombre, "peso"=>$peso);
    }
    $consulta->close();
    return $datos;
}

/* Modificado el comportamiento de claves ajenas de la BD (ON DELETE CASCADE ON UPDATE CASCADE) */
function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipo) {
    $conexion = getConexionSQLi();
    $todoOk = true;
    $conexion->autocommit(false);
    $borrado = $conexion->prepare("DELETE FROM jugadores WHERE nombre=?");
    $borrado->bind_param("s", $jugadorBaja);
    if ($borrado->execute() != true) {
        $todoOk = false;
    }
    $update = $conexion->prepare(
        "INSERT INTO jugadores (codigo, nombre, procedencia, altura, peso, posicion, nombre_equipo) VALUES 
        ((SELECT (t.codigo + 1) from jugadores AS t ORDER BY t.codigo DESC LIMIT 1),?,?,?,?,?,?)");
    $update->bind_param("ssddss", $nombre, $procedencia, $altura, $peso, $posicion, $equipo);
    if ($update->execute() != true) {
        $todoOk = false;
    }

    if ($todoOk){
        $conexion->commit();
        return true;
    } else {
        $conexion->rollBack();
        return false;
    }
}

function updatePeso($nombre, $peso) {
    $conexion = getConexionSQLi();
    $todoOk = true;
    $update = $conexion->prepare("UPDATE jugadores SET peso = ? WHERE nombre = ?");
    $update->bind_param("ds", $peso, $nombre);
    if ($update->execute() != true) {
        $todoOk = false;
    }
    return $todoOk;
}

?>