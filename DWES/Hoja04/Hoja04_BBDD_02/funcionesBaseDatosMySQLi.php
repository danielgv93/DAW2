<?php
require_once "ConexionMySQLi.php";

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