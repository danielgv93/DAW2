<?php
require_once "Funciones.php";

$server = new SoapClient(null, ["uri" => ""]);

$server->setClass("Funciones");
$server->handle();