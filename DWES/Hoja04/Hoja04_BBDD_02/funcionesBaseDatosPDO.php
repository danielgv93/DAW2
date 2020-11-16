<?php
require_once "ConexionPDO.php";

/* Estructura de la tabla libros */
$showCreateTable = "CREATE TABLE libros (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(40) NULL,
	anio_edicion INT(4) UNSIGNED NULL,
	precio DOUBLE UNSIGNED NULL,
	fecha_adquisicion DATE NULL
);
";

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