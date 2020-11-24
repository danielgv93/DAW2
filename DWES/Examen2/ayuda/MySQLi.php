<?php
/* PREPARED STATEMENT */
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

function setBorrado($jugadorBaja)
{
    $conexion = getConexionSQLi();
    $borrado = $conexion->stmt_init();
    $borrado->prepare("DELETE FROM jugadores WHERE nombre=?");
    $borrado->bind_param("s", $jugadorBaja);
    if ($borrado->execute()) {
        $conexion->close();
        return true;
    }
    $conexion->close();
    return false;
}
/* TRANSACCIONES */
function llegarADestino()
{
    $todoOk = true;
    $conexion = getConexionSQLi();
    $conexion->autocommit(false);
    $sql = "DELETE FROM pasajeros;";
    if ($conexion->query($sql) != true) {
        $todoOk = false;
    }
    $sql = "UPDATE plazas SET reservada = 0;";
    if ($conexion->query($sql) != true) {
        $todoOk = false;
    }
    if ($todoOk) {
        $conexion->commit();
        $conexion->close();
        return true;
    } else {
        $conexion->rollback();
        $conexion->close();
        return false;
    }
}
?>