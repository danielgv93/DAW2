<?php
require_once "Circulo.php";
require_once "Monedero.php";

/*$ciruclo1 = new Circulo(3);

$ciruclo1->radio = 2;

echo $ciruclo1->radio;*/

$monedero1 = new Monedero(100);

echo $monedero1->getDinero();
$monedero1->meterDinero(50);
echo "<br>Meter 50€: " . $monedero1->getDinero();
$monedero1->sacarDinero(200);
echo "<br>Sacar 200€: " . $monedero1->getDinero();
$monedero1->sacarDinero(100);
echo "<br>Sacar 100€: " . $monedero1->getDinero();
echo "<br>" . Monedero::$numero_monederos;

$monedero2 = clone $monedero1;
echo $monedero1 === $monedero2;
