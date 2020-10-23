<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <?php
    $numerador = 1;
    $denominador = 2;

    for ($i = 0; $i < 10; $i++) {
        print $numerador / $denominador . "<br>";
        $numerador++;
        $denominador *= 2;
    }
    ?>
</body>

</html>