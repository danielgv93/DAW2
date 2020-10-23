<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
        $valorA = 3;
        $valorB = 1;
        print ("Valor A = $valorA. Valor B = $valorB<br>");
        $aux = $valorA;
        $valorA = $valorB;
        $valorB = $aux;
        print ("Valor A = $valorA. Valor B = $valorB");
    ?>
</body>
</html>