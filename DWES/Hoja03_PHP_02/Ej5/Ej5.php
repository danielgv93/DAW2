<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
        include_once "funcion.php";
        $number = 324225;
        print "Numero inicial: $number <br>";
        print "NºDigitos ".contarDigitos($number)."<br>";
        print capicua($number)."<br>";
        print redondear($number);
    ?>
</body>

</html>