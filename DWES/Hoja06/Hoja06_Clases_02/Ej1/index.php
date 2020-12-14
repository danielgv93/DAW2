<?php
require_once "Empleado.php";
require_once "Encargado.php";

$enc = new Encargado(200);
$empl = new Empleado(200);

echo $enc->getSueldo();
echo $empl->getSueldo();