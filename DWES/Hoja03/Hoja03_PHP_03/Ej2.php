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

    $plantillaMonedas = array("2E" => 2, "1E" => 1, 
    "50c" => 0.5, "20c" => 0.2, "10c" => 0.1,  "5c" => 0.05, "2c" => 0.02, 
    "1c" => 0.01);

    foreach ($plantillaMonedas as $key => $value) {
        $arrayMonedas[$key] = (int)($restoEuros / $value);
        $restoEuros -= $arrayMonedas[$key] * $value;
    }

    echo "EUROS TOTALES: $totalEuros<br><br>" .
    $arrayMonedas["2E"] . " -> 2€<br>" . $arrayMonedas["1E"] . " -> 1€<br>" .
    $arrayMonedas["50c"] . " -> 50cts<br>" . $arrayMonedas["20c"] . " -> 20cts<br>" .
    $arrayMonedas["10c"] . " -> 10cts<br>" . $arrayMonedas["5c"] . " -> 5cts<br>" .
    $arrayMonedas["2c"] . " -> 2cts<br>" . $arrayMonedas["1c"] . " -> 1cts<br>";
    ?>
</body>
</html>