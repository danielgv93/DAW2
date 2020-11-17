<?php
require_once "../ConexionPDO.php";

function llegarADestino()
{
    $todoOk = true;
    $conexion = getConexionPDO();
    $conexion->beginTransaction();
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
        unset($conexion);
        return true;
    } else {
        $conexion->rollback();
        unset($conexion);
        return false;
    }
}

function getPlazasNoReservadas()
{
    $conexion = getConexionPDO();
    $sql = "SELECT numero, precio FROM plazas WHERE reservada = 0;";
    $resultado = $conexion->query($sql);
    ;
    while ($fila = $resultado->fetch()) {
        $datos[] = array("numero" => $fila["numero"], "precio" => $fila["precio"]);
    }
    return $datos;
}

function reservarAsiento($nombre, $dni, $asiento)
{
    $todoOk = true;
    $conexion = getConexionPDO();
    $conexion->beginTransaction();
    $sql = "UPDATE plazas SET reservada = 1 WHERE numero = ?;";
    $reserva = $conexion->prepare($sql);
    $reserva->bindParam(1, $asiento);
    if ($reserva->execute() != true) {
        $todoOk = false;
    }
    $sql = "INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (?,?,'-',?);";
    $reserva = $conexion->prepare($sql);
    $reserva->bindParam(1, $dni);
    $reserva->bindParam(2, $nombre);
    $reserva->bindParam(3, $asiento);
    if ($reserva->execute() != true) {
        $todoOk = false;
    }

    if ($todoOk) {
        $conexion->commit();
        return true;
    } else {
        $conexion->rollback();
        return false;
    }
}