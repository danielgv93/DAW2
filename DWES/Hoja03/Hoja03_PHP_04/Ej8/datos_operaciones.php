<?php
$operacion = $_POST["operacion"];
$n1 = $_POST["num1"];
$n2 = $_POST["num2"];
function operacion($operacion, $n1, $n2)
{
    if ($operacion == "suma") {
        print($n1 + $n2);
    } elseif ($operacion == "resta") {
        print($n1 - $n2);
    } elseif ($operacion == "multiplicacion") {
        print($n1 * $n2);
    } elseif ($operacion == "division") {
        print($n1 / $n2);
    } else {
        return false;
    }
}

?>


<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Numeros</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body class="container">
    <div class="row border p-3 mt-5">
        <div class="col">
            <div class="row justify-content-center">
                <h2>El resultado de realizar un <?php print "$operacion de los numeros $n1 y $n2" ?> es:</h2>
            </div>
            <div class="row justify-content-center pt-3 pb-3">
                <h1><?php operacion($operacion, $n1, $n2) ?></h1>
            </div>
            <div class="row justify-content-center">
                <a href="operaciones.html"><button class="btn btn-primary">VOLVER</button></a>
            </div>
        </div>

    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>