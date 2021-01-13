<?php
require_once "BaseDatos.php";
session_start();
$error = "<br>";
if (isset($_POST["buscar"])){
    if (BaseDatos::getInstance()->matriculaCorrecta($_POST["matricula"])) {
        $cliente = BaseDatos::getInstance()->getCliente($_POST["matricula"]);
        // echo $cliente;
        $_SESSION["cliente"] = $cliente;
        header("Location: misdatos.php");
    } else {
        $error = "Matricula no encontrada";
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
    <title>Index</title>
</head>
<body>
<form action="" method="post">
    <h1>Busca tu coche</h1>
    <input type="text" name="matricula"><br>
    <?= $error ?>
    <br>
    <input type="submit" name="buscar" value="Buscar">
</form>
<hr>
</body>
</html>