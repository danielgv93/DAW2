<?php
require_once "queriesMySQLi.php";
require_once "queriesPDO.php";

$cliente = getClienteMayorVenta();
$comercio = getComercioMayorVenta();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Asociacion de comercios</h1>
<img src="imagenes/clientes/<?= $cliente["imagen"]?>"><br>
<p>El cliente que mas ha gastado es <?= $cliente["nombre"]?></p>
<p><?= $cliente["importe"]?>€</p>
<img src="imagenes/comercios/<?= $comercio["imagen"] ?>"><br>
<p>El comercio que mas ventas ha realizado es <?= $comercio["nombre"] ?></p>
<p>Ha realizado <?= $comercio["ventas"] ?> ventas</p>
<hr>
<a href="index.php"><input type="button" value="Pagina inicial"></a>
<a href="comercios.php"><input type="button" value="Ver todas las compras de los comercios"></a>
<a href="nuevacompra.php"><input type="button" value="Añadir nueva compra"></a>
</body>
</html>