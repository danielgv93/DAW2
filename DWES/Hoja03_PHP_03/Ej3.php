<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php

    function getLetra($dni)
    {
        if ($dni > 0 && strlen($dni) == 8) {
            $letras = array(
                "T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X",
                "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"
            );
            $resto = $dni % 23;
            foreach ($letras as $item => $key) {
                if ($resto == $item) {
                    return $key;
                }
            }
        }
    }
    $dniSinLetra = 12345678;
    $letra = getLetra($dniSinLetra);
    echo $dniSinLetra . "-" . $letra;
    
    ?>
</body>

</html>