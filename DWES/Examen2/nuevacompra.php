<?php
require_once "queriesPDO.php";
$texto = "";
if (isset($_POST["insertar"])) {
    if (empty($_POST["fecha"]) || empty($_POST["importe"])) {
        $texto = "Faltan datos por introducir";
    } else {
        if (insertarCompra($_POST["comercio"], $_POST["cliente"], $_POST["fecha"], $_POST["importe"])) {
            $texto = "Compra insertada con exito";
        }
    }
}

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
<form action="#" method="post">
    COMERCIO:<select name="comercio">
        <?php foreach (getComercios() as $comercio) : ?>
            <option value="<?= $comercio["id"] ?>"><?= $comercio["nombre"] ?></option>
        <?php endforeach; ?>
    </select><br>
    CLIENTE:<select name="cliente">
        <?php foreach (getClientes() as $cliente) : ?>
            <option value="<?= $cliente["id"] ?>"><?= $cliente["nombre"] ?></option>
        <?php endforeach; ?>
    </select><br>
    FECHA: <input type="date" name="fecha"><br>
    IMPORTE: <input type="number" name="importe"><br>
    <input type="submit" name="insertar" value="Insertar Compra">
</form>
<?= $texto ?>
<hr>
<a href="index.php"><input type="button" value="Pagina inicial"></a>
<a href="comercios.php"><input type="button" value="Ver todas las compras de los comercios"></a>
<a href="nuevacompra.php"><input type="button" value="Añadir nueva compra"></a>
</body>
</html>
