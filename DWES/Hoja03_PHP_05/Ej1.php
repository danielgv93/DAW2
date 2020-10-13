<?php
$texto = "";
if (isset($_POST["submit"])) {
    $cantidad = filtrado($_POST["cantidad"]);
    $destino = filtrado($_POST["destino"]);
    $origen = filtrado($_POST["origen"]);

    $tcEuro = array("euro" => 1, "dolar" => 1.09, "libra" => 0.89);
    $tcDolar = array("euro" => 0.91, "dolar" => 1, "libra" => 0.81);
    $tcLibra = array("euro" => 1.12, "dolar" => 1.23, "libra" => 1);

    $tiposCambio = array("euro" => $tcEuro, "dolar" => $tcDolar, "libra" => $tcLibra);

    $resultado = $cantidad * $tiposCambio[$origen][$destino];
    $texto = "$cantidad $origen son $resultado $destino";

    // FUNCION IMPORTANTE DE FILTRADO. SEGURIDAD.
    function filtrado($texto)
    {
        $texto = trim($texto);
        $texto = stripslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

    /* FORMA ORIGINAL CON UN BUCLE
    
    $tiposCambio = array(
        "libraeuro" => 1.1, "eurolibra" => 0.9, "dolareuro" => 0.85,
        "eurodolar" => 1.17, "libradolar" => 1.29, "dolarlibra" => 0.77
    );

    foreach ($tiposCambio as $key => $value) {
        if ($key == ($origen . $destino)) {
            $resultado = $cantidad * $value;
            $texto = "$cantidad $origen son $resultado $destino";
            break;
        } elseif ($origen == $destino) {
            $resultado = $cantidad;
            $texto = "$cantidad $origen son $resultado $destino";
            break;
        }
    } */
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Conversor de monedas</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
    <div class="container border">
        <div class="row text-center">
            <div class="col bg-primary text-light"><?php print "$texto" ?></div>
        </div>
        <div class="row text-center">
            <h2 class="col">Conversor de monedas</h2>
        </div>
        <div class="row justify-content-center">
            <form class="col-4 " method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" <?php
                                            if (isset($_POST["cantidad"])) {
                                                echo "value = '$cantidad'";
                                            }
                                            ?> name="cantidad" id="cantidad" class="form-control" step="any" min="0" required>
                </div>
                <div class="form-group">
                    <label for="origen">Origen</label>
                    <select class="form-control" name="origen" id="origen">
                        <option disabled selected value> -- elige una opcion -- </option>

                        <option value="libra">Libras</option>
                        <option value="euro">Euros</option>
                        <option value="dolar">Dolares</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destino">Destino</label>
                    <select class="form-control" name="destino" id="destino">
                        <option disabled selected value> -- elige una opcion -- </option>
                        <option value="libra">Libras</option>
                        <option value="euro">Euros</option>
                        <option value="dolar">Dolares</option>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <input name="submit" class="btn btn-primary mb-3" type="submit" value="Convertir">
                </div>
            </form>

        </div>

    </div>

</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>