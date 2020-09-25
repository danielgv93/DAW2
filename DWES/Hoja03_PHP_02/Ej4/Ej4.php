<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <h2>Tipo de interes Simple</h2>
    <p>
        <?php
        include_once "funciones.php";
        print interesSimple(10000, 5);
        ?>
    </p>
    <h2>Tipo de interes Compuesto</h2>
    <p>
        <?php
        include_once "funciones.php";
        print interesCompuesto(10000, 5);
        ?>
    </p>
</body>

</html>