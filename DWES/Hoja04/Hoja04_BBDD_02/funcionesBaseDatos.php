<?php require_once "DWES/Hoja04/ConexionPDO.php";

function crearBaseDatosYTabla ()
{
    $conexion = getConexionPDOBD();
    $conexion->exec("CREATE DATABASE IF NOT EXISTS dwes_02_libros");
    $conexion->exec("USE dwes_02_libros");
    $crearTabla = "CREATE TABLE IF NOT EXISTS libros (
        id int unsigned auto_increment primary key ,
        titulo varchar(40) not null ,
        añoEdicion int(4) not null ,
        precio float not null ,
        fechaAdquisicion date not null
    )";
    $conexion->exec($crearTabla);
    unset($conexion);
}