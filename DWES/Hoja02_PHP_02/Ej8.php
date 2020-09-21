<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php
        $dinero = 127;
        print ("Dinero inicial: $dinero.<br>");
        $billetesDiez = $dinero / 10;
        settype ($billetesDiez, "int");

        $dinero -= $billetesDiez * 10;
        $billetesCinco = $dinero / 5;
        settype ($billetesCinco, "int");

        $dinero -= $billetesCinco * 5;

        print ("Hay $billetesDiez billetes de 10€, $billetesCinco billetes 
        de 5€ y $dinero monedas de 1€")
    ?>
</body>
</html>