<?php
require_once "BaseDatos.php";
session_start();
$error = "";
if (isset($_POST["comprar"])) {
    if (BaseDatos::getInstance()->realizarCompra($_SESSION["cliente"], $_POST["turismo"])) {
        $error = "Compra realizada con exito";
    } else {
        $error = "Error al realizar la compra";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprar</title>
</head>
<body>
<h1><?= $_SESSION["cliente"]->getNombre() ?> va a comprar...</h1>
<form action="" method="post">
    <label>Turismo:
        <select name="turismo">
            <?php foreach (BaseDatos::getInstance()->getTurismosEnVenta($_SESSION["cliente"]) as $turismo) : ?>
                <option value="<?= $turismo->getMatricula() ?>"><?= $turismo->getModelo() ?> de <?= $turismo->getCliente()->getNombre() ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <input type="submit" name="comprar" value="Comprar">
</form>
<hr>
<?= $error ?>
<hr>
<a href="misdatos.php"><button>Volver a mis vehiculos</button></a>
<a href="logout.php"><button>Desconectar</button></a>
</body>
</html>
