<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
    $conjER = array("o", "es", "e", "emos", "eis", "en");
    $conjIR = array("o", "es", "e", "imos", "is", "en");
    $conjAR = array("o", "as", "a", "amos", "ais", "an");
    $verbos = array("comer", "bailar", "vivir");
    $verbo = $verbos[rand(0, count($verbos)-1)];
    $terminacion = substr($verbo, -2);
    $raiz = substr($verbo, strlen($verbo) - 2);

    if ($terminacion == "ar") {
        foreach ($conjAR as $item) {
            
        }
    } else if ($terminacion == "er") {
        
    } else if ($terminacion == "ir") {

    } else {
        print "Terminacion del verbo incorrecta";
    }


    

    ?>
</body>
</html>