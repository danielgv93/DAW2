<?php
/* PREPARED STATEMENT */
function getJugadoresDeEquipo($a) {
    $conexionNBA = getConexionPDO();
    $consulta = $conexionNBA->prepare("SELECT nombre, peso FROM jugadores WHERE nombre_equipo=?");
    $consulta->bindParam(1, $a);
    if($consulta->execute()) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("nombre"=>$fila["nombre"], "peso" => $fila["peso"]);
        }
    }
    unset($conexionNBA);
    return $datos;
}
function insertarLibro($a, $b, $c, $d)
{
    $conexion = getConexionPDO();
    $sql = "INSERT INTO libros (titulo, anio_edicion, precio, fecha_adquisicion) VALUES (?,?,?,?)";
    $insercion = $conexion->prepare($sql);
    $insercion->bindParam(1, $a);
    $insercion->bindParam(2, $b);
    $insercion->bindParam(3, $c);
    $insercion->bindParam(4, $d);
    if ($insercion->execute()) {
        unset($conexion);
        return true;
    } else {
        unset($conexion);
        return false;
    }
}

/* TRANSACCION */
function llegarADestino()
{
    try {
        $conexion = getConexionPDO();
        $conexion->beginTransaction();
        $sql = "DELETE FROM pasajeros;";
        if ($conexion->query($sql) != true) {
            throw new Exception("Error al borrar los pasajeros");
        }

        $sql = "UPDATE plazas SET reservada = 0;";
        if ($conexion->query($sql) != true) {
            throw new Exception("Error al actualizar las plazas");
        }
        $conexion->commit();
        unset($conexion);
        return true;
    } catch (Exception $e) {
        $conexion->rollback();
        echo $e->getMessage();
        unset($conexion);
        return false;
    }
}
?>