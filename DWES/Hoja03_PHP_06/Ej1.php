<?php
$concesionario = array(
    "Seat" => array("Ibiza", "León", "Alhambra", "Arona", "Ateca", "Tarraco"),
    "Citroen" => array("C3", "C4", "C2", "Berlingo", "C1", "C5"),
    "Kia" => array("Sportage", "Picanto", "Rio", "Sorento", "Ceed", "Stonic")
);

if (isset($_POST["mostrar"])) {
    $busqueda = $_POST["marca"];
}

if (isset($_POST["actualizar"])) {
    $busqueda = $_POST["busqueda"];
    $modelosActualizados = $_POST["modelosActualizados"];

    /* Si se da al boton Actualizar, se comprueba si los nuevos inputs son iguales al array original,
    y si no es asi se modifica */
    for ($i = 0; $i < count($concesionario[$busqueda]); $i++) {
        if ($concesionario[$busqueda][$i] != $modelosActualizados[$i]) {
            echo "Se ha actualizado " . $concesionario[$busqueda][$i] . " por $modelosActualizados[$i]";
            $concesionario[$busqueda][$i] = $modelosActualizados[$i];
        }
    }
}

?>



<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Ejercicio 1</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center border">
            <div class="col-8">
                <h1>Busca tu coche</h1>
                <!-- PRIMER FORMULARIO: MARCA - COCHE -->
                <form class="form-check" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="form-group">
                        <label for="marca">Marca: </label>
                        <select class="form-control" name="marca" id="marca">
                            <?php foreach ($concesionario as $key => $value) : ?>
                                <option value='<?= $key ?>'> <?= $key ?> </option>";
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row justify-content-center">
                        <input type="submit" name="mostrar" class="btn btn-primary mb-2" value="Mostrar">
                    </div>
                </form>

                <!-- SI EJECUTO MOSTRAR -->
                <?php
                if (isset($busqueda)) : ?>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <form class="form-check" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                                <?php foreach ($concesionario[$busqueda] as $modelo) : ?>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="modelosActualizados[]" value="<?= $modelo ?>">
                                    </div>
                                <?php endforeach; ?>

                                <div class="row justify-content-center mb-2">
                                    <input class="btn btn-primary" type="submit" name="actualizar" value="Actualizar">
                                </div>

                                <input type="hidden" name="busqueda" value="<?= $busqueda ?>">

                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</html>