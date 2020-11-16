<?php
require_once "ConexionMySQLi.php";

/* Estructura de la tabla libros */
$showCreateTable = "CREATE TABLE libros (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(40) NULL,
	anio_edicion INT(4) UNSIGNED NULL,
	precio DOUBLE UNSIGNED NULL,
	fecha_adquisicion DATE NULL
);
";

function getLibros()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT * FROM libros";
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_array();
    while ($fila != null) {
        $libros[] = array("ID"=>$fila["id"],"Titulo"=>$fila["titulo"], "Año de Edicion"=>$fila["anio_edicion"], "Precio"=>$fila["precio"], "Fecha de Adquisicion"=>$fila["fecha_adquisicion"]);
        $fila = $resultado->fetch_array();
    }
    unset($conexion);
    return $libros;
}

;