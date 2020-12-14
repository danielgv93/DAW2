<?php
require_once "CuentaAhorro.php";
require_once "CuentaCorriente.php";

$cc = new CuentaCorriente(3, "Daniel", 100, 20);
$ca = new CuentaAhorro(4, "Joseba", 100, 20, 40);

$cc->mostrar();
$cc->reintegro(20);
$cc->mostrar();

echo "<hr>";

$ca->mostrar();
$ca->aplicaIntereses(0.2);
$ca->mostrar();
