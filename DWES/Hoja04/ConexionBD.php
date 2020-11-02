<?php 
function getConexion($bbdd) {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    return new PDO(
        'mysql:host=localhost;dbname='.$bbdd,
        'root',
        '',
        $opciones
    );
}
function getConexionBD() {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    return new PDO("mysql:host=localhost", "root", "", $opciones);
}
