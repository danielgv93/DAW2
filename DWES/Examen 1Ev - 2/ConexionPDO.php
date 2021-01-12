<?php
define("HOSTPDO", "localhost");
define("USERNAMEPDO", "root");
define("PASSWORDPDO", "");
define("DATABASEPDO", "dwes_examen_202011");
function getConexionPDO() {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    return new PDO(
        'mysql:host='.HOSTPDO.';dbname='.DATABASEPDO,
        USERNAMEPDO,
        PASSWORDPDO,
        $opciones
    );
}