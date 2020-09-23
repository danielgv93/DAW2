<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    $numero = 6;
    $factorialTotal = $numero;
    for ($i = $numero; $i > 0; $i--) {
        if ($i == 1) {
            break;
        }
        $factorialTotal *= ($i - 1);
    }
    print $factorialTotal;
    ?>
</body>

</html>