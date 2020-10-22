<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php

    $array1 = array();
    $array2 = array();
    $arrayTotal = array();

    // FUNCIONES
    function cargarArray($tamañoArray)
    {
        for ($i = 0; $i < $tamañoArray; $i++) {
            $array[$i] = rand(0, 50);
        }
        return $array;
    }

    function mostrarArray($array)
    {
        foreach ($array as $element) {
            print ($element) . " ";
        }
    }

    function ordenar($array)
    {
        do {
            $boolean = false;
            for ($i = 0; $i < count($array) - 1; $i++) {
                if ($array[$i] > $array[$i + 1]) {
                    list($array[$i + 1], $array[$i]) =
                        array($array[$i], $array[$i + 1]);
                    $boolean = true;
                }
            }
        } while ($boolean);
        return $array;
    }

    function mezclarArrays($array1, $array2)
    {
        foreach ($array2 as $item) {
            $array1[] = $item;
        }
        return $array1;
    }

    $array1 = cargarArray(20);
    $array2 = cargarArray(20);

    mostrarArray($array1);
    echo "<br>";
    mostrarArray($array2);
    echo "<br>";

    $arrayTotal = mezclarArrays($array1, $array2);
    echo "<br>";
    echo "<br>";

    mostrarArray($arrayTotal);

    $arrayTotal = ordenar($arrayTotal);
    echo "<br>";
    echo "<br>";

    mostrarArray($arrayTotal);

    ?>
</body>

</html>