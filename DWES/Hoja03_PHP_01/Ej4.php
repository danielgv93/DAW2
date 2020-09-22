<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        $numero = 100;
        while ($numero <= 999) {
            $inverso = 0;
            $aux = $numero;
            while ($aux != 0) { // BUCLE INFINITO ???
                $resto = $numero % 10;
                $inverso = $inverso * 10 + $resto;
                $aux = (int) ($numero / 10);
            }
            if ($numero == $inverso) {
                echo "$numero, ";
            }
            $numero++;
        }
    ?>
</body>
</html>