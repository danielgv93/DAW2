<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width<br> initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
    $totalEuros = 7.38;
    $restoEuros = $totalEuros;
    $arrayMonedas = array();
    $arrayMonedas["2E"] = (int)($totalEuros / 2);
    $restoEuros -= $arrayMonedas["2E"] * 2;

    $arrayMonedas["1E"] = (int)($restoEuros);
    $restoEuros -= $arrayMonedas["1E"];

    $arrayMonedas["50c"] = (int)($restoEuros / 0.5);
    $restoEuros -= $arrayMonedas["50c"] * 0.5;

    $arrayMonedas["20c"] = (int)($restoEuros / 0.2);
    $restoEuros -= $arrayMonedas["20c"] * 0.2;

    $arrayMonedas["10c"] = (int)($restoEuros / 0.1);
    $restoEuros -= $arrayMonedas["10c"] * 0.1;

    $arrayMonedas["5c"] = (int)($restoEuros / 0.05);
    $restoEuros -= $arrayMonedas["5c"] * 0.05;

    $arrayMonedas["2c"] = (int)($restoEuros / 0.02);
    $restoEuros -= $arrayMonedas["2c"] * 0.02;

    $arrayMonedas["1c"] = (int)($restoEuros / 0.01);
    $restoEuros -= $arrayMonedas["1c"] * 0.01;

    echo "EUROS TOTALES: $totalEuros<br><br>";
    echo $arrayMonedas["2E"] . " -> 2€<br>" . $arrayMonedas["1E"] . " -> 1€<br>" .
    $arrayMonedas["50c"] . " -> 50cts<br>" . $arrayMonedas["20c"] . " -> 20cts<br>" .
    $arrayMonedas["10c"] . " -> 10cts<br>" . $arrayMonedas["5c"] . " -> 5cts<br>" .
    $arrayMonedas["2c"] . " -> 2cts<br>" . $arrayMonedas["1c"] . " -> 1cts<br>";
    ?>
</body>
</html>