<?php
require_once "funcionesBaseDatosMySQLi.php";

$libros = getLibros();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a href="libros.php"><button class="btn btn-primary">VOLVER</button></a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <?php foreach ($libros[0] as $key => $value) : ?>
                    <th><?= $key ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <?php foreach ($libros as $libro) : ?>
            <tr>
                <td><?= $libro["ID"] ?></td>
                <td><?= $libro["Titulo"] ?></td>
                <td><?= $libro["Año de Edicion"] ?></td>
                <td><?= $libro["Precio"] ?></td>
                <td><?= $libro["Fecha de Adquisicion"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
