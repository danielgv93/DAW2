<?php
require_once "ConexionPDO.php";

function insertarLibro($titulo, $edicion, $precio, $adquisicion)
{
    $conexion = getConexionPDO();
    $sql = "INSERT INTO libros (titulo, anio_edicion, precio, fecha_adquisicion) VALUES (?,?,?,?)";
    $insercion = $conexion->prepare($sql);
    $insercion->bindParam(1, $titulo);
    $insercion->bindParam(2, $edicion);
    $insercion->bindParam(3, $precio);
    $insercion->bindParam(4, $adquisicion);
    if ($insercion->execute()) {
        unset($conexion);
        return true;
    } else {
        unset($conexion);
        return false;
    }
}