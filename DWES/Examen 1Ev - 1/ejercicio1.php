<?php 
$historico = array(
    "Torrelavega" => array("Enero" => 85, "Febrero" => 68, "Marzo" => 67, "Abril" => 86, "Mayo" => 62, "Junio" => 54, "Julio" => 39, "Agosto" => 61, "Septiembre" => 84, "Octubre" => 99, "Noviembre" => 120, "Diciembre" => 115),
    "Sevilla" => array("Enero" => 76, "Febrero" => 73, "Marzo" => 66, "Abril" => 53, "Mayo" => 34, "Junio" => 14, "Julio" => 1, "Agosto" => 3, "Septiembre" => 18, "Octubre" => 69, "Noviembre" => 87, "Diciembre" => 82),
    "Madrid" => array("Enero" => 43, "Febrero" => 44, "Marzo" => 35, "Abril" => 45, "Mayo" => 44, "Junio" => 28, "Julio" => 11, "Agosto" => 11, "Septiembre" => 30, "Octubre" => 51, "Noviembre" => 58, "Diciembre" => 50)
);
$texto = "";
if (isset($_POST["comprobar"]) && isset($_POST["ciudad"]) && !empty($_POST["precipitacion"])) {
    $ciudadSeleccionada = $_POST["ciudad"];
    $precipitacion = $_POST["precipitacion"];
    $totalCiudad = 0;
    foreach ($historico[$ciudadSeleccionada] as $mes => $numero) {
        $totalCiudad += $numero;
    }
    $mediaCiudad = $totalCiudad / 12;
    $texto = crearTexto($mediaCiudad, $precipitacion, $ciudadSeleccionada);
}

function crearTexto($mediaCiudad, $precipitacion, $ciudadSeleccionada)
{
    $texto = "La precipitacion media anual de $ciudadSeleccionada es ";
    if ($mediaCiudad < $precipitacion) {
        $texto .= "MAYOR ";
    } else if ($mediaCiudad > $precipitacion) {
        $texto .= "MENOR ";
    } else {
        $texto .= "IGUAL ";
    }
    $texto .= "que $precipitacion. Concretamente $mediaCiudad";
    return $texto;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Comprobar precipitaciones</h1>
<form action="#" method="post">

    <?php foreach ($historico as $ciudad => $precipitaciones) : ?>

        <label for="<?= $ciudad ?>">
            <input type="radio" id="<?= $ciudad ?>" <?= $checkedProp = (isset($ciudadSeleccionada) &&
                $ciudadSeleccionada == $ciudad) ? "checked" : ""; ?> name="ciudad" value="<?= $ciudad ?>">
            <?= $ciudad ?></label>
    <?php endforeach ?>

    <br>
    Precipitación Media:<br>
    <input type="number" name="precipitacion" step="any">
    <input type="submit" name="comprobar" value="Comprobar">

</form>
    <?php
    if (isset($_POST["comprobar"])) {
        echo $texto;
    }
    ?>
</body>
</html>