<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php 
    $fecha = "01-01-2020";
    $arrayFecha = explode("-", $fecha);
    $dia = $arrayFecha[0];
    $mes = $arrayFecha[1];
    $año = $arrayFecha[2];
    
    print checkdate($mes, $dia, $año);
    ?>
</body>
</html>