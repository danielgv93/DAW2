<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        $nombre = "Juan";
        print ("Informacion de la variable 'nombre': "); 
        var_dump($nombre);
        print ("<br>Contenido de la variable: $nombre.");
        $nombre = null;
        print ("<br>Después de asignarle un valor nulo: ").gettype($nombre);
    ?>
</body>
</html>