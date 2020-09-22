<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
    
    $total = 0;
    for ($i=10; $i <= 100 ; $i+=2) { 
        $total += $i;
    }
    print $total;
    ?>
</body>
</html>