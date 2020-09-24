<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php 
        $precioKM = 2.5;
        $distancia = 900;
        $dias = 9;
        $precioTotal = $precioKM * $distancia;
        if ($distancia > 800 && $dias > 7) {
           $precioTotal *= 0.7;
        }
        print "El precio del billete total para $distancia kms y $dias dias es de:"."<br>";
        print $precioTotal;
    ?>
</body>
</html>