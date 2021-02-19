<?php
require_once "Funciones.php";

$server = new SoapServer(null, ["uri" => ""]);

$server->setClass("Funciones");
$server->handle();