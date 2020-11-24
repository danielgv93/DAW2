<?php
require_once "queriesPDO.php";
$texto = "";
if (isset($_POST["consultar"])) {
    $comercioSelected = $_POST["comercio"];
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
    <select name="comercio">
        <?php foreach (getComercios() as $comercio) : ?>
            <option value="<?= $comercio["id"] ?>"<?php if (isset($_POST["consultar"]) && $_POST["comercio"] == $comercio["id"]) echo "selected" ?>><?= $comercio["nombre"] ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" name="consultar" value="Consultar">
</form>
<img src="imagenes/comercios/<?php if(isset($_POST["consultar"])) echo getComercios()[$comercioSelected]["imagen"] ?>" alt="">
<?php if (isset($_POST["consultar"])) :
    $ventas = getVentasComercios($_POST["comercio"]) ?>
    <?php if ($ventas == false) : ?>
        <?php $texto = "Aun no se ha realizado ninguna venta" ?>
    <?php else: ?>
        <table>
            <tr>
                <td>Cliente</td>
                <td>Importe</td>
                <td>Fecha</td>
            </tr>
            <?php foreach ($ventas as $ventaComercio) : ?>
                <tr>
                    <td><?= $ventaComercio["cliente"] ?></td>
                    <td><?= $ventaComercio["importe"] ?></td>
                    <td><?= $ventaComercio["fecha"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
<?php endif;
echo $texto;
?>
<hr>
<a href="index.php"><input type="button" value="Pagina inicial"></a>
<a href="comercios.php"><input type="button" value="Ver todas las compras de los comercios"></a>
<a href="nuevacompra.php"><input type="button" value="Añadir nueva compra"></a>
</p></body>
</html>