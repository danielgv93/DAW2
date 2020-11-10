<?php
require_once "funcionesBaseDatosPDO.php";
if (insertarLibro($_POST["titulo"], $_POST["añoEdicion"], $_POST["precio"], $_POST["fechaAdquisicion"])) {
    $texto = "Insertado el libro ".$_POST["titulo"]." con exito";
} else {
    $texto = "Error al insertar el libro";
}
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
    <h2><?= $texto ?></h2>

</div>
</body>
</html>
