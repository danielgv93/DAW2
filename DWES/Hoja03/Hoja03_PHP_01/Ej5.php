<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    $suma = 0;
    $multiplicacion = 0;
    $numeroInicial = 321;
    $numero = $numeroInicial;
    $a = 0;
    $b = 0;
    $c = 0;

    $c = $numero % 10;
    $numero = (int)($numero / 10);
    $b = $numero % 10;
    $numero = (int)($numero / 10);
    $a = $numero % 10;

    $suma = $a + $b + $c;
    $multiplicacion = $a * $b * $c;

    if ($suma == $multiplicacion) {
        print "El numero $numeroInicial cumple la condicion";
    } else {
        print "El numero $numeroInicial no cumple la condicion";
    }

    ?>
</body>

</html>