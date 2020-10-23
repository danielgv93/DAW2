<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio 5</title>
</head>
<body>
    <?php
        $horas = 1;
        $fecha = "2020-09-22 18:00:00";
        $fecha = strtotime($fecha) + strtotime($horas);
        $fecha = gmdate("d-m-Y H:i:s",$fecha);
        echo $fecha;
    ?>
</body>
</html>