<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<body>
    <?php 
        $numero = 17;
        $aux = $numero - 1;
        $primo = true;
        if ($numero > 0) {
            while ($aux > 1 && $primo) {
                if ($numero % $aux == 0) {
                    $primo = false;
                }
                $aux--;
            }
            if ($primo) {
                print "El numero $numero es primo";
            } else {
                print "El numero $numero NO es primo";
            }

        } else {
            print "Numero negativo";
        }

        

        /* for ($i=0; $i < $numero; $i++) { 
            if () {
                # code...
            }
            $aux--;
        } */
    ?>
</body>
</html>