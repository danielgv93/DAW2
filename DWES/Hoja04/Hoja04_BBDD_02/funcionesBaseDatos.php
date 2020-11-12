<?php require_once "DWES/Hoja04/ConexionPDO.php";

function crearBaseDatosYTabla ()
{
    $conexion = getConexionPDOBD("dwes_02_libros");
    $conexion->exec("CREATE DATABASE IF NOT EXISTS dwes_02_libros");
    $conexion->exec("USE dwes_02_libros");
    $crearTabla = "CREATE TABLE IF NOT EXISTS libros (
        id int unsigned auto_increment,
        titulo varchar(40),
        añoEdicion int(4) unsigned,
        precio int unsigned,
        fechaAdquisicion date,
        PRIMARY KEY (id) 
    )";
    $conexion->exec($crearTabla);
    unset($conexion);
}

function insertarLibro($titulo, $edicion, $precio, $adquisicion)
{
    $conexion = getConexionPDOBD("dwes_02_libros");

}

;