<?php
$location = "http://aplicaciones.ivanlorenzo.es/dwes/monedas/MonedasWSDL.php";
$uri = "http://aplicaciones.ivanlorenzo.es/dwes/monedas";
$tipoCambio = "";
if (isset($_POST["d_e"])) {
    try {
        $objeto = new SoapClient($location);
        $tipoCambio = $objeto->cambiarMonedas("USD", "EUR", "2021-02-08", $_POST["cantidad"]);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST["e_d"])) {
    try {
        $objeto = new SoapClient($location);
        $tipoCambio = $objeto->cambiarMonedas("EUR", "USD", "2021-02-08", $_POST["cantidad"]);
    } catch (Exception $e) {
        echo $e->getMessage();
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
    <title>Document</title>
</head>
<body>
<form action="#" method="post">
    <h1>Conversor de monedas</h1>
    <label for="cantidad">Cantidad: </label><input type="text" name="cantidad" id="cantidad"><br>
    <input type="submit" name="d_e" value="Dolares a euros">
    <input type="submit" name="e_d" value="Euros a dolares">
</form>
<hr>
<?= $tipoCambio ?>
</body>
</html>
