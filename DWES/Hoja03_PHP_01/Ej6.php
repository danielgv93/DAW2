<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    <?php

    $nmin = 0;
    $nmax = 1;
    $n = 1;

    print "$nmin ,";
    for ($i = 0; $i < 10; $i++) {
        $nmax = $n + $nmin;
        print $nmax . ", ";
        $nmin = $n;
        $n = $nmax;
    }
    ?>
</body>

</html>