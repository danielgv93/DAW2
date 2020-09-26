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
    
    for ($i = 0; $i < 20; $i++) {
        $array1[$i] = ($i+1);
    }
    for ($i = 0; $i < 20; $i++) {
        $array2[$i] = ($i+1);
    }

    print_r($array1);
    echo "<br>";
    print_r($array2);
    echo "<br>";
    
    $arrayTotal = array_merge($array1, $array2);
    echo "<br>";
    echo "<br>";

    print_r($arrayTotal);

    sort($arrayTotal);
    echo "<br>";
    echo "<br>";

    print_r($arrayTotal);

    ?>
</body>

</html>