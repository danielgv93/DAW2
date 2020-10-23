<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>
    <?php 

        $primo = true;

        for ($numero=3; $numero < 999; $numero++) { 
            $aux = $numero - 1;
            while ($aux > 1) {
                if ($numero % $aux == 0) {
                    $primo = false;
                } else {
                    $primo = true;
                }
                $aux--;
            }
            if ($primo) {
                print $numero ." ";
            }
        }
        
        
    ?>
</body>
</html>