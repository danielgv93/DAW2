<?php
require_once "../ConexionMySQLi.php";

function getLibros()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT * FROM libros";
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_array();
    while ($fila != null) {
        $libros[] = array("ID"=>$fila["id"],"Titulo"=>$fila["titulo"], "Año de Edicion"=>$fila["añoEdicion"], "Precio"=>$fila["precio"], "Fecha de Adquisicion"=>$fila["fechaAdquisicion"]);
        $fila = $resultado->fetch_array();
    }
    unset($conexion);
    return $libros;
}

;