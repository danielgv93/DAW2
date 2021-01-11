<?php
require_once "Database.php";

$productos = Database::getInstance()->getProductos();

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categoria</th>
    </tr>
    <?php foreach ($productos as $producto) : ?>
    <tr>
        <td><?= $producto->getCodigo() ?></td>
        <td><?= $producto->getNombre() ?></td>
        <td><?= $producto->getPrecio() ?></td>
        <td><?= $producto->getCategoria() ?></td>
    </tr>
    <?php endforeach;?>
</table>
</body>
</html>
