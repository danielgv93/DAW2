<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        $fecha1 = "2020-09-22";
        $fecha2 = "2020-07-15";
        $dias = strtotime($fecha1) - strtotime($fecha2);
        /* Strtotime devuelve una fecha en Unix en segundos. Para saber cuantos
        para saber cuantos dias son los segundos devueltos dividimos entre
        86400*/
        $dias = $dias /86400;
        print $dias." días";
    ?>
</body>
</html>