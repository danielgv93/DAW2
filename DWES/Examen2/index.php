<?php
require_once "queriesMySQLi.php";
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
<img src="imagenes/clientes/<?= $cliente[0]["imagen"]?>"><br>
<p>El cliente que mas ha gastado es <?= $cliente[0]["nombre"]?></p>
<p><?= $cliente[0]["importe"]?>€</p>
<img src="imagenes/comercios/<?= $comercio[0]["imagen"] ?>"><br>
<p>El comercio que mas ventas ha realizado es <?= $comercio[0]["nombre"] ?></p>
<p>Ha realizado <?= $comercio[0]["ventas"] ?> ventas</p>
<hr>
<a href="index.php"><input type="button" value="Pagina inicial"></a>
<a href="comercios.php"><input type="button" value="Ver todas las compras de los comercios"></a>
<a href="nuevacompra.php"><input type="button" value="Añadir nueva compra"></a>
</body>
</html>