<?php
require_once "../ConexionMySQLi.php";

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

function getPlazasNoReservadas()
{
    $conexion = getConexionSQLi();
    $sql =
    $conexion->query()
}

;