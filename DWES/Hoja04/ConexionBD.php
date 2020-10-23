<?php 
function getConexion($bbdd) {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conexion = new PDO(
        'mysql:host=localhost;dbname='.$bbdd,
        'root',
        '',
        $opciones
    );
    return $conexion;
}
