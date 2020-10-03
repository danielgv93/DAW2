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

    //Elegir un verbo al azar
    $verbo = $verbos[rand(0, count($verbos)-1)];
    $terminacion = substr($verbo, -2);
    $raiz = substr($verbo, 0, (strlen($verbo) - 2));
    //Conjugar el verbo
    $conjugacion = "";
    if ($terminacion == "ar") {
        foreach ($conjAR as $item) {
            $conjugacion .= $raiz . $item . " ";
        }
    } else if ($terminacion == "er") {
        foreach ($conjER as $item) {
            $conjugacion .= $raiz . $item . " ";
        }
    } else if ($terminacion == "ir") {
        foreach ($conjIR as $item) {
            $conjugacion .= $raiz . $item . " ";
        }
    } else {
        print "Terminacion del verbo incorrecta";
    }

    print $conjugacion;
    

    ?>
</body>
</html>