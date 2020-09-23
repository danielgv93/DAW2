<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    $numero = 4;
    $factorialTotal = 0;
    for ($i = $numero; $i > 0; $i--) {
        $factorialTotal = $i * ($i - 1);
    }
    print $factorialTotal;
    ?>
</body>

</html>